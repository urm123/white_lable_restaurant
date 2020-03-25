<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- production version, optimized for size and speed -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
<div id="root">
    <div>
        <table>
            <tr>
                <td>
                    Available Count = @{{ available_count}}
                </td>
                <td>
                    Not Available Count = @{{ not_available_count}}
                </td>
                <td>
                    <button type="button" @click="show_hide=false">Hide available</button>
                </td>
                <td>
                    <button type="button" @click="show_hide=true">Show available</button>
                </td>
            </tr>
        </table>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="menu_item in menu_items" v-if="!menu_item.status||(show_hide&&menu_item.status)">
            <td>@{{ menu_item.id }}</td>
            <td>@{{ menu_item.name }}</td>
            <td>@{{ menu_item.logo }}</td>
            <td>
                <span v-if="menu_item.status" style="background: green;">Available</span>
                <span v-if="!menu_item.status" style="background: red;">Not Available</span>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    let data = {
        menu_items:{!! json_encode($menu_items) !!},
        available_count: 0,
        not_available_count: 0,
        show_hide: true
    };

    let root = new Vue({
        data: data,
        el: '#root',
        mounted: function () {
            let $this = this;
            this.menu_items.forEach(function (menu_item) {
                axios.get('{{getStorageUrl()}}' + menu_item.logo).then(function (response) {
                    menu_item.status = true;
                    $this.available_count++;
                }).catch(function (error) {
                    $this.not_available_count++;
                    console.log(error)
                })
            });
        }
    });
</script>
</body>
</html>
