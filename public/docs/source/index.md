---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET -G "http://localhost/oauth/authorize" 
```
```javascript
const url = new URL("http://localhost/oauth/authorize");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/authorize`


<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST "http://localhost/oauth/authorize" 
```
```javascript
const url = new URL("http://localhost/oauth/authorize");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE "http://localhost/oauth/authorize" 
```
```javascript
const url = new URL("http://localhost/oauth/authorize");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST "http://localhost/oauth/token" 
```
```javascript
const url = new URL("http://localhost/oauth/token");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_d6a56149547e03307199e39e03e12d1c -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET -G "http://localhost/oauth/tokens" 
```
```javascript
const url = new URL("http://localhost/oauth/tokens");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/tokens`


<!-- END_d6a56149547e03307199e39e03e12d1c -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "http://localhost/oauth/tokens/1" 
```
```javascript
const url = new URL("http://localhost/oauth/tokens/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST "http://localhost/oauth/token/refresh" 
```
```javascript
const url = new URL("http://localhost/oauth/token/refresh");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET -G "http://localhost/oauth/clients" 
```
```javascript
const url = new URL("http://localhost/oauth/clients");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/clients`


<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST "http://localhost/oauth/clients" 
```
```javascript
const url = new URL("http://localhost/oauth/clients");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT "http://localhost/oauth/clients/1" 
```
```javascript
const url = new URL("http://localhost/oauth/clients/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE "http://localhost/oauth/clients/1" 
```
```javascript
const url = new URL("http://localhost/oauth/clients/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET -G "http://localhost/oauth/scopes" 
```
```javascript
const url = new URL("http://localhost/oauth/scopes");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/scopes`


<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->

<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET -G "http://localhost/oauth/personal-access-tokens" 
```
```javascript
const url = new URL("http://localhost/oauth/personal-access-tokens");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/personal-access-tokens`


<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST "http://localhost/oauth/personal-access-tokens" 
```
```javascript
const url = new URL("http://localhost/oauth/personal-access-tokens");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "http://localhost/oauth/personal-access-tokens/1" 
```
```javascript
const url = new URL("http://localhost/oauth/personal-access-tokens/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

<!-- START_f7828fe70326ce6166fdba9c0c9d80ed -->
## api/search
> Example request:

```bash
curl -X GET -G "http://localhost/api/search" 
```
```javascript
const url = new URL("http://localhost/api/search");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "success",
    "data": {
        "interests": [
            {
                "id": 10,
                "user_id": "14",
                "name": "GUSTOLATINO\t",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "gustolatino@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant10.jpg",
                "price_range": "0",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "10",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 0,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 3,
                "user_id": "7",
                "name": "GOA BEACH",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Colpitty",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 47 07 77 18",
                "email": "goabeach@mail.com",
                "website": null,
                "description": "Best place",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant3.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-11 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:22:16",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "3",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:22:16",
                            "updated_at": "2019-06-12 08:22:16"
                        }
                    }
                ],
                "sort": 1,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 16,
                        "restaurant_id": "3",
                        "postcode": "00600",
                        "delivery_time": "20",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:24:46",
                        "updated_at": "2019-06-12 08:24:46",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 8,
                "user_id": "12",
                "name": "ALLOCUBAINE",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allocubaine@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant8.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "8",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 2,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 12,
                "user_id": "16",
                "name": "Palaisinde",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisinde.fr@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant12.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 07:40:14",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "12",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 07:40:14",
                            "updated_at": "2019-06-12 07:40:14"
                        }
                    }
                ],
                "sort": 3,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 6,
                "user_id": "10",
                "name": "MASALABURGAR",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Dehiwala",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "masalaburgar@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant6.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:58:51",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "6",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:58:51",
                            "updated_at": "2019-06-12 09:58:51"
                        }
                    }
                ],
                "sort": 4,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 13,
                "user_id": "17",
                "name": "palaisdemaharaja",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisdemaharaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant13.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "13",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 5,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 4,
                "user_id": "8",
                "name": "CHUTNEYMADRAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Kirulapone",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "chutneymadras@mail.com",
                "website": "chtneymadras.fr",
                "description": "Good food",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant4.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:31:11",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "4",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:31:11",
                            "updated_at": "2019-06-12 08:31:11"
                        }
                    }
                ],
                "sort": 6,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 9,
                "user_id": "13",
                "name": "ALLOFAJITAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allofajitas@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant9.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "9",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 7,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 2,
                "user_id": "6",
                "name": "ELTAQUELA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Bambalapitiya",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "eltaquela@mail.com",
                "website": null,
                "description": "Wow",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant2.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:12:06",
                "things_to_know": "casuals evening",
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "2",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:12:06",
                            "updated_at": "2019-06-12 08:12:06"
                        }
                    }
                ],
                "sort": 8,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 15,
                        "restaurant_id": "2",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "20",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:19:32",
                        "updated_at": "2019-06-12 08:19:32",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 1,
                "user_id": "5",
                "name": "KERALATASTE",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "keralataste@mail.com",
                "website": "keralataste.com",
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant1.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": true,
                "menu_discount": true,
                "promocode": true,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-13 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 11:02:24",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "1",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 11:02:24",
                            "updated_at": "2019-06-12 11:02:24"
                        }
                    }
                ],
                "sort": 9,
                "rating": 4,
                "delivery_locations": [
                    {
                        "id": 22,
                        "restaurant_id": "1",
                        "postcode": "00600",
                        "delivery_time": "10",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    },
                    {
                        "id": 23,
                        "restaurant_id": "1",
                        "postcode": "00790",
                        "delivery_time": "20",
                        "delivery_cost": "20",
                        "minimum_total": "50",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 7,
                "user_id": "11",
                "name": "MAHARAAJA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "maharaaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant7.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "7",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 10,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 11,
                "user_id": "15",
                "name": "HAVANPALAYA",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": null,
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "havanpalaya@mail.com",
                "website": "havanpalaya.com",
                "description": "This Is Havanpalaya",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant11.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-10 12:47:12",
                "things_to_know": "Formal",
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "11",
                            "cuisine_id": "1",
                            "created_at": "2019-06-10 12:47:12",
                            "updated_at": "2019-06-10 12:47:12"
                        }
                    }
                ],
                "sort": 11,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 14,
                        "restaurant_id": "11",
                        "postcode": "00600",
                        "delivery_time": "30",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-10 12:49:48",
                        "updated_at": "2019-06-10 12:49:48",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 5,
                "user_id": "9",
                "name": "SIVAALAYA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "sivaalaya@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant5.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:56:04",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "5",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:56:04",
                            "updated_at": "2019-06-12 09:56:04"
                        }
                    }
                ],
                "sort": 12,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 17,
                        "restaurant_id": "5",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "5",
                        "minimum_total": "20",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 09:56:44",
                        "updated_at": "2019-06-12 09:56:44",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            }
        ],
        "recommended": [
            {
                "id": 10,
                "user_id": "14",
                "name": "GUSTOLATINO\t",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "gustolatino@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant10.jpg",
                "price_range": "0",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "10",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 0,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 3,
                "user_id": "7",
                "name": "GOA BEACH",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Colpitty",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 47 07 77 18",
                "email": "goabeach@mail.com",
                "website": null,
                "description": "Best place",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant3.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-11 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:22:16",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "3",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:22:16",
                            "updated_at": "2019-06-12 08:22:16"
                        }
                    }
                ],
                "sort": 1,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 16,
                        "restaurant_id": "3",
                        "postcode": "00600",
                        "delivery_time": "20",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:24:46",
                        "updated_at": "2019-06-12 08:24:46",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 8,
                "user_id": "12",
                "name": "ALLOCUBAINE",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allocubaine@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant8.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "8",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 2,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 12,
                "user_id": "16",
                "name": "Palaisinde",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisinde.fr@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant12.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 07:40:14",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "12",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 07:40:14",
                            "updated_at": "2019-06-12 07:40:14"
                        }
                    }
                ],
                "sort": 3,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 6,
                "user_id": "10",
                "name": "MASALABURGAR",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Dehiwala",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "masalaburgar@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant6.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:58:51",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "6",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:58:51",
                            "updated_at": "2019-06-12 09:58:51"
                        }
                    }
                ],
                "sort": 4,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 13,
                "user_id": "17",
                "name": "palaisdemaharaja",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisdemaharaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant13.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "13",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 5,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 4,
                "user_id": "8",
                "name": "CHUTNEYMADRAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Kirulapone",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "chutneymadras@mail.com",
                "website": "chtneymadras.fr",
                "description": "Good food",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant4.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:31:11",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "4",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:31:11",
                            "updated_at": "2019-06-12 08:31:11"
                        }
                    }
                ],
                "sort": 6,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 9,
                "user_id": "13",
                "name": "ALLOFAJITAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allofajitas@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant9.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "9",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 7,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 2,
                "user_id": "6",
                "name": "ELTAQUELA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Bambalapitiya",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "eltaquela@mail.com",
                "website": null,
                "description": "Wow",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant2.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:12:06",
                "things_to_know": "casuals evening",
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "2",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:12:06",
                            "updated_at": "2019-06-12 08:12:06"
                        }
                    }
                ],
                "sort": 8,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 15,
                        "restaurant_id": "2",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "20",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:19:32",
                        "updated_at": "2019-06-12 08:19:32",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 1,
                "user_id": "5",
                "name": "KERALATASTE",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "keralataste@mail.com",
                "website": "keralataste.com",
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant1.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": true,
                "menu_discount": true,
                "promocode": true,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-13 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 11:02:24",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "1",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 11:02:24",
                            "updated_at": "2019-06-12 11:02:24"
                        }
                    }
                ],
                "sort": 9,
                "rating": 4,
                "delivery_locations": [
                    {
                        "id": 22,
                        "restaurant_id": "1",
                        "postcode": "00600",
                        "delivery_time": "10",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    },
                    {
                        "id": 23,
                        "restaurant_id": "1",
                        "postcode": "00790",
                        "delivery_time": "20",
                        "delivery_cost": "20",
                        "minimum_total": "50",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 7,
                "user_id": "11",
                "name": "MAHARAAJA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "maharaaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant7.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "7",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "sort": 10,
                "rating": 5,
                "delivery_locations": [],
                "reviews": []
            },
            {
                "id": 11,
                "user_id": "15",
                "name": "HAVANPALAYA",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": null,
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "havanpalaya@mail.com",
                "website": "havanpalaya.com",
                "description": "This Is Havanpalaya",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant11.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-10 12:47:12",
                "things_to_know": "Formal",
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "11",
                            "cuisine_id": "1",
                            "created_at": "2019-06-10 12:47:12",
                            "updated_at": "2019-06-10 12:47:12"
                        }
                    }
                ],
                "sort": 11,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 14,
                        "restaurant_id": "11",
                        "postcode": "00600",
                        "delivery_time": "30",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-10 12:49:48",
                        "updated_at": "2019-06-10 12:49:48",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            },
            {
                "id": 5,
                "user_id": "9",
                "name": "SIVAALAYA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "sivaalaya@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant5.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:56:04",
                "things_to_know": null,
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "5",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:56:04",
                            "updated_at": "2019-06-12 09:56:04"
                        }
                    }
                ],
                "sort": 12,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 17,
                        "restaurant_id": "5",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "5",
                        "minimum_total": "20",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 09:56:44",
                        "updated_at": "2019-06-12 09:56:44",
                        "deleted_at": null
                    }
                ],
                "reviews": []
            }
        ],
        "popular": [
            {
                "id": 11,
                "user_id": "15",
                "name": "HAVANPALAYA",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": null,
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "havanpalaya@mail.com",
                "website": "havanpalaya.com",
                "description": "This Is Havanpalaya",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant11.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-10 12:47:12",
                "things_to_know": "Formal",
                "sort": 0,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 14,
                        "restaurant_id": "11",
                        "postcode": "00600",
                        "delivery_time": "30",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-10 12:49:48",
                        "updated_at": "2019-06-10 12:49:48",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "11",
                            "cuisine_id": "1",
                            "created_at": "2019-06-10 12:47:12",
                            "updated_at": "2019-06-10 12:47:12"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 1,
                "user_id": "5",
                "name": "KERALATASTE",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "keralataste@mail.com",
                "website": "keralataste.com",
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant1.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": true,
                "menu_discount": true,
                "promocode": true,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-13 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 11:02:24",
                "things_to_know": null,
                "sort": 1,
                "rating": 4,
                "delivery_locations": [
                    {
                        "id": 22,
                        "restaurant_id": "1",
                        "postcode": "00600",
                        "delivery_time": "10",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    },
                    {
                        "id": 23,
                        "restaurant_id": "1",
                        "postcode": "00790",
                        "delivery_time": "20",
                        "delivery_cost": "20",
                        "minimum_total": "50",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "1",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 11:02:24",
                            "updated_at": "2019-06-12 11:02:24"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 12,
                "user_id": "16",
                "name": "Palaisinde",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisinde.fr@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant12.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 07:40:14",
                "things_to_know": null,
                "sort": 2,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "12",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 07:40:14",
                            "updated_at": "2019-06-12 07:40:14"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 9,
                "user_id": "13",
                "name": "ALLOFAJITAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allofajitas@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant9.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 3,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "9",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 7,
                "user_id": "11",
                "name": "MAHARAAJA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "maharaaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant7.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 4,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "7",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 5,
                "user_id": "9",
                "name": "SIVAALAYA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "sivaalaya@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant5.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:56:04",
                "things_to_know": null,
                "sort": 5,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 17,
                        "restaurant_id": "5",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "5",
                        "minimum_total": "20",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 09:56:44",
                        "updated_at": "2019-06-12 09:56:44",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "5",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:56:04",
                            "updated_at": "2019-06-12 09:56:04"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 3,
                "user_id": "7",
                "name": "GOA BEACH",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Colpitty",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 47 07 77 18",
                "email": "goabeach@mail.com",
                "website": null,
                "description": "Best place",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant3.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-11 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:22:16",
                "things_to_know": null,
                "sort": 6,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 16,
                        "restaurant_id": "3",
                        "postcode": "00600",
                        "delivery_time": "20",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:24:46",
                        "updated_at": "2019-06-12 08:24:46",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "3",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:22:16",
                            "updated_at": "2019-06-12 08:22:16"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 13,
                "user_id": "17",
                "name": "palaisdemaharaja",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisdemaharaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant13.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 7,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "13",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 10,
                "user_id": "14",
                "name": "GUSTOLATINO\t",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "gustolatino@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant10.jpg",
                "price_range": "0",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 8,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "10",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 8,
                "user_id": "12",
                "name": "ALLOCUBAINE",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allocubaine@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant8.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 9,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "8",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 6,
                "user_id": "10",
                "name": "MASALABURGAR",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Dehiwala",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "masalaburgar@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant6.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:58:51",
                "things_to_know": null,
                "sort": 10,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "6",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:58:51",
                            "updated_at": "2019-06-12 09:58:51"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 4,
                "user_id": "8",
                "name": "CHUTNEYMADRAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Kirulapone",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "chutneymadras@mail.com",
                "website": "chtneymadras.fr",
                "description": "Good food",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant4.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:31:11",
                "things_to_know": null,
                "sort": 11,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "4",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:31:11",
                            "updated_at": "2019-06-12 08:31:11"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 2,
                "user_id": "6",
                "name": "ELTAQUELA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Bambalapitiya",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "eltaquela@mail.com",
                "website": null,
                "description": "Wow",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant2.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:12:06",
                "things_to_know": "casuals evening",
                "sort": 12,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 15,
                        "restaurant_id": "2",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "20",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:19:32",
                        "updated_at": "2019-06-12 08:19:32",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "2",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:12:06",
                            "updated_at": "2019-06-12 08:12:06"
                        }
                    }
                ],
                "reviews": []
            }
        ],
        "cuisines": [
            {
                "id": 1,
                "name": "Indian",
                "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image1.jpg",
                "created_at": "2019-05-29 17:16:31",
                "updated_at": "2019-05-29 17:16:31",
                "deleted_at": null,
                "count": 13,
                "selected": true
            },
            {
                "id": 2,
                "name": "Chinese",
                "logo": "http:\/\/eatoeat-staging.club\/app\/cuisine\/pjrnPa4F2JvifK8LzuJJOJKcZBlYZveakubIyunU.jpeg",
                "created_at": "2019-05-30 10:40:46",
                "updated_at": "2019-05-30 10:40:46",
                "deleted_at": null,
                "count": 0,
                "selected": true
            },
            {
                "id": 3,
                "name": "Japanese",
                "logo": "http:\/\/eatoeat-staging.club\/app\/cuisine\/PCaImqYuomra2JKcZlKHUtsrMrc1YyP7o8sIT0He.jpeg",
                "created_at": "2019-05-30 10:45:34",
                "updated_at": "2019-05-30 10:45:34",
                "deleted_at": null,
                "count": 0,
                "selected": true
            },
            {
                "id": 4,
                "name": "Sri Lankan",
                "logo": "http:\/\/eatoeat-staging.club\/app\/cuisine\/XEWmErcAAQGM5aaNECvUmqoBCLxYpCUx4zjsPTP9.png",
                "created_at": "2019-06-04 07:45:22",
                "updated_at": "2019-06-04 07:45:22",
                "deleted_at": null,
                "count": 0,
                "selected": true
            }
        ],
        "postcode": "",
        "type": "delivery",
        "orders": []
    }
}
```

### HTTP Request
`GET api/search`


<!-- END_f7828fe70326ce6166fdba9c0c9d80ed -->

<!-- START_4afa35ee22b2eac118576f9c729d465f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/cuisine" 
```
```javascript
const url = new URL("http://localhost/api/cuisine");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "success",
    "data": {
        "cuisines": [
            {
                "id": 1,
                "name": "Indian",
                "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image1.jpg",
                "created_at": "2019-05-29 17:16:31",
                "updated_at": "2019-05-29 17:16:31",
                "deleted_at": null,
                "restaurant_count": "13"
            }
        ]
    }
}
```

### HTTP Request
`GET api/cuisine`


<!-- END_4afa35ee22b2eac118576f9c729d465f -->

<!-- START_9a61c82cd22b6d74ff13ce0590638775 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/cuisine/create" 
```
```javascript
const url = new URL("http://localhost/api/cuisine/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/cuisine/create`


<!-- END_9a61c82cd22b6d74ff13ce0590638775 -->

<!-- START_b3c8035a8e07894d3aa1b5978f3e9d83 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/cuisine" 
```
```javascript
const url = new URL("http://localhost/api/cuisine");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/cuisine`


<!-- END_b3c8035a8e07894d3aa1b5978f3e9d83 -->

<!-- START_47a0b93aab39c8acad866157f8fcbd4f -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/api/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "success",
    "data": {
        "cuisine": {
            "id": 1,
            "name": "Indian",
            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image1.jpg",
            "created_at": "2019-05-29 17:16:31",
            "updated_at": "2019-05-29 17:16:31",
            "deleted_at": null,
            "restaurants": [
                {
                    "id": 1,
                    "user_id": "5",
                    "name": "KERALATASTE",
                    "category": null,
                    "takeaway": false,
                    "delivery": true,
                    "reserve": false,
                    "county": null,
                    "city": "Wellawatta",
                    "province": "Western",
                    "country": "Sri Lanka",
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "keralataste@mail.com",
                    "website": "keralataste.com",
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant1.jpg",
                    "price_range": "1",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": true,
                    "menu_discount": true,
                    "promocode": true,
                    "discount_type": "flat_rate",
                    "discount_value": "10",
                    "expiry_date": "2019-06-13 00:00:00",
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-12 11:02:24",
                    "things_to_know": null,
                    "reviews": [
                        {
                            "id": 3,
                            "user_id": "4",
                            "restaurant_id": "1",
                            "rating": "3",
                            "review": "this is review",
                            "response": "thank you",
                            "created_at": "2019-06-03 13:07:11",
                            "updated_at": "2019-06-12 08:07:54",
                            "deleted_at": null
                        },
                        {
                            "id": 4,
                            "user_id": "18",
                            "restaurant_id": "1",
                            "rating": "5",
                            "review": null,
                            "response": null,
                            "created_at": "2019-06-10 07:58:07",
                            "updated_at": "2019-06-10 07:58:07",
                            "deleted_at": null
                        },
                        {
                            "id": 5,
                            "user_id": "18",
                            "restaurant_id": "1",
                            "rating": "5",
                            "review": "good",
                            "response": null,
                            "created_at": "2019-06-11 08:45:41",
                            "updated_at": "2019-06-11 08:45:41",
                            "deleted_at": null
                        }
                    ],
                    "rating": 4,
                    "sort": 0,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "1",
                        "created_at": "2019-06-12 11:02:24",
                        "updated_at": "2019-06-12 11:02:24"
                    }
                },
                {
                    "id": 2,
                    "user_id": "6",
                    "name": "ELTAQUELA",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Bambalapitiya",
                    "province": "Western",
                    "country": "Sri Lanka",
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "eltaquela@mail.com",
                    "website": null,
                    "description": "Wow",
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant2.jpg",
                    "price_range": "1",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-12 08:12:06",
                    "things_to_know": "casuals evening",
                    "reviews": [],
                    "rating": 5,
                    "sort": 1,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "2",
                        "created_at": "2019-06-12 08:12:06",
                        "updated_at": "2019-06-12 08:12:06"
                    }
                },
                {
                    "id": 3,
                    "user_id": "7",
                    "name": "GOA BEACH",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Colpitty",
                    "province": "Western",
                    "country": "sri lanka",
                    "postcode": "00600",
                    "phone": "01 47 07 77 18",
                    "email": "goabeach@mail.com",
                    "website": null,
                    "description": "Best place",
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant3.jpg",
                    "price_range": "1",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": "flat_rate",
                    "discount_value": "10",
                    "expiry_date": "2019-06-11 00:00:00",
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-12 08:22:16",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 2,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "3",
                        "created_at": "2019-06-12 08:22:16",
                        "updated_at": "2019-06-12 08:22:16"
                    }
                },
                {
                    "id": 4,
                    "user_id": "8",
                    "name": "CHUTNEYMADRAS",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Kirulapone",
                    "province": "Western",
                    "country": "sri lanka",
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "chutneymadras@mail.com",
                    "website": "chtneymadras.fr",
                    "description": "Good food",
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant4.jpg",
                    "price_range": "3",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-12 08:31:11",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 3,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "4",
                        "created_at": "2019-06-12 08:31:11",
                        "updated_at": "2019-06-12 08:31:11"
                    }
                },
                {
                    "id": 5,
                    "user_id": "9",
                    "name": "SIVAALAYA",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Wellawatta",
                    "province": "Western",
                    "country": "sri lanka",
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "sivaalaya@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant5.jpg",
                    "price_range": "3",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-12 09:56:04",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 4,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "5",
                        "created_at": "2019-06-12 09:56:04",
                        "updated_at": "2019-06-12 09:56:04"
                    }
                },
                {
                    "id": 6,
                    "user_id": "10",
                    "name": "MASALABURGAR",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Dehiwala",
                    "province": "Western",
                    "country": "sri lanka",
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "masalaburgar@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant6.jpg",
                    "price_range": "3",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-12 09:58:51",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 5,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "6",
                        "created_at": "2019-06-12 09:58:51",
                        "updated_at": "2019-06-12 09:58:51"
                    }
                },
                {
                    "id": 7,
                    "user_id": "11",
                    "name": "MAHARAAJA",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Wellawatthe",
                    "province": "Western",
                    "country": null,
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "maharaaja@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant7.jpg",
                    "price_range": "1",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-05-29 13:39:47",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 6,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "7",
                        "created_at": "2019-05-29 17:18:08",
                        "updated_at": "2019-05-29 17:18:08"
                    }
                },
                {
                    "id": 8,
                    "user_id": "12",
                    "name": "ALLOCUBAINE",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Wellawatthe",
                    "province": "Western",
                    "country": null,
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "allocubaine@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant8.jpg",
                    "price_range": "3",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-05-29 13:39:47",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 7,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "8",
                        "created_at": "2019-05-29 17:18:08",
                        "updated_at": "2019-05-29 17:18:08"
                    }
                },
                {
                    "id": 9,
                    "user_id": "13",
                    "name": "ALLOFAJITAS",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Wellawatthe",
                    "province": "Western",
                    "country": null,
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "allofajitas@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant9.jpg",
                    "price_range": "2",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-05-29 13:39:47",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 8,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "9",
                        "created_at": "2019-05-29 17:18:08",
                        "updated_at": "2019-05-29 17:18:08"
                    }
                },
                {
                    "id": 10,
                    "user_id": "14",
                    "name": "GUSTOLATINO\t",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Wellawatthe",
                    "province": "Western",
                    "country": null,
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "gustolatino@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant10.jpg",
                    "price_range": "0",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-05-29 13:39:47",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 9,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "10",
                        "created_at": "2019-05-29 17:18:08",
                        "updated_at": "2019-05-29 17:18:08"
                    }
                },
                {
                    "id": 11,
                    "user_id": "15",
                    "name": "HAVANPALAYA",
                    "category": null,
                    "takeaway": false,
                    "delivery": true,
                    "reserve": false,
                    "county": null,
                    "city": "Wellawatta",
                    "province": null,
                    "country": "Sri Lanka",
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "havanpalaya@mail.com",
                    "website": "havanpalaya.com",
                    "description": "This Is Havanpalaya",
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant11.jpg",
                    "price_range": "2",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-10 12:47:12",
                    "things_to_know": "Formal",
                    "reviews": [
                        {
                            "id": 1,
                            "user_id": "18",
                            "restaurant_id": "11",
                            "rating": "5",
                            "review": "good",
                            "response": null,
                            "created_at": "2019-05-30 13:21:51",
                            "updated_at": "2019-05-30 13:21:51",
                            "deleted_at": null
                        },
                        {
                            "id": 2,
                            "user_id": "18",
                            "restaurant_id": "11",
                            "rating": "5",
                            "review": "good",
                            "response": null,
                            "created_at": "2019-05-30 13:22:05",
                            "updated_at": "2019-05-30 13:22:05",
                            "deleted_at": null
                        }
                    ],
                    "rating": 5,
                    "sort": 10,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "11",
                        "created_at": "2019-06-10 12:47:12",
                        "updated_at": "2019-06-10 12:47:12"
                    }
                },
                {
                    "id": 12,
                    "user_id": "16",
                    "name": "Palaisinde",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Wellawatta",
                    "province": "Western",
                    "country": "sri lanka",
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "palaisinde.fr@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant12.jpg",
                    "price_range": "1",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-06-12 07:40:14",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 11,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "12",
                        "created_at": "2019-06-12 07:40:14",
                        "updated_at": "2019-06-12 07:40:14"
                    }
                },
                {
                    "id": 13,
                    "user_id": "17",
                    "name": "palaisdemaharaja",
                    "category": null,
                    "takeaway": true,
                    "delivery": true,
                    "reserve": true,
                    "county": null,
                    "city": "Wellawatthe",
                    "province": "Western",
                    "country": null,
                    "postcode": "00600",
                    "phone": "01 44 90 09 07",
                    "email": "palaisdemaharaja@mail.com",
                    "website": null,
                    "description": null,
                    "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant13.jpg",
                    "price_range": "3",
                    "seats": null,
                    "parking": "0",
                    "subscription": null,
                    "discount": false,
                    "menu_discount": false,
                    "promocode": false,
                    "discount_type": null,
                    "discount_value": null,
                    "expiry_date": null,
                    "allergy_information": null,
                    "before_information": null,
                    "online": "1",
                    "created_at": "2019-05-29 13:50:00",
                    "deleted_at": null,
                    "updated_at": "2019-05-29 13:39:47",
                    "things_to_know": null,
                    "reviews": [],
                    "rating": 5,
                    "sort": 12,
                    "pivot": {
                        "cuisine_id": "1",
                        "restaurant_id": "13",
                        "created_at": "2019-05-29 17:18:08",
                        "updated_at": "2019-05-29 17:18:08"
                    }
                }
            ]
        }
    }
}
```

### HTTP Request
`GET api/cuisine/{cuisine}`


<!-- END_47a0b93aab39c8acad866157f8fcbd4f -->

<!-- START_538e6a69b4714ef06743319c4b3b051f -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/cuisine/1/edit" 
```
```javascript
const url = new URL("http://localhost/api/cuisine/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/cuisine/{cuisine}/edit`


<!-- END_538e6a69b4714ef06743319c4b3b051f -->

<!-- START_4b39837ef1d29dc894213061fd661e7f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/api/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/cuisine/{cuisine}`

`PATCH api/cuisine/{cuisine}`


<!-- END_4b39837ef1d29dc894213061fd661e7f -->

<!-- START_b863e7cbaa485e580059e2beb1c25210 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/api/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/cuisine/{cuisine}`


<!-- END_b863e7cbaa485e580059e2beb1c25210 -->

<!-- START_632941d07a55564f2bdfd829f46ea89f -->
## api/restaurant
> Example request:

```bash
curl -X GET -G "http://localhost/api/restaurant" 
```
```javascript
const url = new URL("http://localhost/api/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "success",
    "data": {
        "restaurants": [
            {
                "id": 1,
                "user_id": "5",
                "name": "KERALATASTE",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "keralataste@mail.com",
                "website": "keralataste.com",
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant1.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": true,
                "menu_discount": true,
                "promocode": true,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-13 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 11:02:24",
                "things_to_know": null,
                "sort": 0,
                "rating": 4,
                "delivery_locations": [
                    {
                        "id": 22,
                        "restaurant_id": "1",
                        "postcode": "00600",
                        "delivery_time": "10",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    },
                    {
                        "id": 23,
                        "restaurant_id": "1",
                        "postcode": "00790",
                        "delivery_time": "20",
                        "delivery_cost": "20",
                        "minimum_total": "50",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 10:57:59",
                        "updated_at": "2019-06-12 10:57:59",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "1",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 11:02:24",
                            "updated_at": "2019-06-12 11:02:24"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 2,
                "user_id": "6",
                "name": "ELTAQUELA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Bambalapitiya",
                "province": "Western",
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "eltaquela@mail.com",
                "website": null,
                "description": "Wow",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant2.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:12:06",
                "things_to_know": "casuals evening",
                "sort": 1,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 15,
                        "restaurant_id": "2",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "20",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:19:32",
                        "updated_at": "2019-06-12 08:19:32",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "2",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:12:06",
                            "updated_at": "2019-06-12 08:12:06"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 3,
                "user_id": "7",
                "name": "GOA BEACH",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Colpitty",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 47 07 77 18",
                "email": "goabeach@mail.com",
                "website": null,
                "description": "Best place",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant3.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": "flat_rate",
                "discount_value": "10",
                "expiry_date": "2019-06-11 00:00:00",
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:22:16",
                "things_to_know": null,
                "sort": 2,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 16,
                        "restaurant_id": "3",
                        "postcode": "00600",
                        "delivery_time": "20",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 08:24:46",
                        "updated_at": "2019-06-12 08:24:46",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "3",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:22:16",
                            "updated_at": "2019-06-12 08:22:16"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 4,
                "user_id": "8",
                "name": "CHUTNEYMADRAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Kirulapone",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "chutneymadras@mail.com",
                "website": "chtneymadras.fr",
                "description": "Good food",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant4.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 08:31:11",
                "things_to_know": null,
                "sort": 3,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "4",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 08:31:11",
                            "updated_at": "2019-06-12 08:31:11"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 5,
                "user_id": "9",
                "name": "SIVAALAYA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "sivaalaya@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant5.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:56:04",
                "things_to_know": null,
                "sort": 4,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 17,
                        "restaurant_id": "5",
                        "postcode": "00600",
                        "delivery_time": "15",
                        "delivery_cost": "5",
                        "minimum_total": "20",
                        "free_delivery": "0",
                        "created_at": "2019-06-12 09:56:44",
                        "updated_at": "2019-06-12 09:56:44",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "5",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:56:04",
                            "updated_at": "2019-06-12 09:56:04"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 6,
                "user_id": "10",
                "name": "MASALABURGAR",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Dehiwala",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "masalaburgar@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant6.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 09:58:51",
                "things_to_know": null,
                "sort": 5,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "6",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 09:58:51",
                            "updated_at": "2019-06-12 09:58:51"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 7,
                "user_id": "11",
                "name": "MAHARAAJA",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "maharaaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant7.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 6,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "7",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 8,
                "user_id": "12",
                "name": "ALLOCUBAINE",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allocubaine@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant8.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 7,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "8",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 9,
                "user_id": "13",
                "name": "ALLOFAJITAS",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "allofajitas@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant9.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 8,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "9",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 10,
                "user_id": "14",
                "name": "GUSTOLATINO\t",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "gustolatino@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant10.jpg",
                "price_range": "0",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 9,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "10",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 11,
                "user_id": "15",
                "name": "HAVANPALAYA",
                "category": null,
                "takeaway": false,
                "delivery": true,
                "reserve": false,
                "county": null,
                "city": "Wellawatta",
                "province": null,
                "country": "Sri Lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "havanpalaya@mail.com",
                "website": "havanpalaya.com",
                "description": "This Is Havanpalaya",
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant11.jpg",
                "price_range": "2",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-10 12:47:12",
                "things_to_know": "Formal",
                "sort": 10,
                "rating": 5,
                "delivery_locations": [
                    {
                        "id": 14,
                        "restaurant_id": "11",
                        "postcode": "00600",
                        "delivery_time": "30",
                        "delivery_cost": "10",
                        "minimum_total": "10",
                        "free_delivery": "0",
                        "created_at": "2019-06-10 12:49:48",
                        "updated_at": "2019-06-10 12:49:48",
                        "deleted_at": null
                    }
                ],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "11",
                            "cuisine_id": "1",
                            "created_at": "2019-06-10 12:47:12",
                            "updated_at": "2019-06-10 12:47:12"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 12,
                "user_id": "16",
                "name": "Palaisinde",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatta",
                "province": "Western",
                "country": "sri lanka",
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisinde.fr@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant12.jpg",
                "price_range": "1",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-06-12 07:40:14",
                "things_to_know": null,
                "sort": 11,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "12",
                            "cuisine_id": "1",
                            "created_at": "2019-06-12 07:40:14",
                            "updated_at": "2019-06-12 07:40:14"
                        }
                    }
                ],
                "reviews": []
            },
            {
                "id": 13,
                "user_id": "17",
                "name": "palaisdemaharaja",
                "category": null,
                "takeaway": true,
                "delivery": true,
                "reserve": true,
                "county": null,
                "city": "Wellawatthe",
                "province": "Western",
                "country": null,
                "postcode": "00600",
                "phone": "01 44 90 09 07",
                "email": "palaisdemaharaja@mail.com",
                "website": null,
                "description": null,
                "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant13.jpg",
                "price_range": "3",
                "seats": null,
                "parking": "0",
                "subscription": null,
                "discount": false,
                "menu_discount": false,
                "promocode": false,
                "discount_type": null,
                "discount_value": null,
                "expiry_date": null,
                "allergy_information": null,
                "before_information": null,
                "online": "1",
                "created_at": "2019-05-29 13:50:00",
                "deleted_at": null,
                "updated_at": "2019-05-29 13:39:47",
                "things_to_know": null,
                "sort": 12,
                "rating": 5,
                "delivery_locations": [],
                "cuisines": [
                    {
                        "id": 1,
                        "name": "Indian",
                        "logo": "cuisines\/image1.jpg",
                        "created_at": "2019-05-29 17:16:31",
                        "updated_at": "2019-05-29 17:16:31",
                        "deleted_at": null,
                        "pivot": {
                            "restaurant_id": "13",
                            "cuisine_id": "1",
                            "created_at": "2019-05-29 17:18:08",
                            "updated_at": "2019-05-29 17:18:08"
                        }
                    }
                ],
                "reviews": []
            }
        ]
    }
}
```

### HTTP Request
`GET api/restaurant`


<!-- END_632941d07a55564f2bdfd829f46ea89f -->

<!-- START_ab14891a52e0f0f5cd3ed4c1f0a87e76 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/restaurant/create" 
```
```javascript
const url = new URL("http://localhost/api/restaurant/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/restaurant/create`


<!-- END_ab14891a52e0f0f5cd3ed4c1f0a87e76 -->

<!-- START_0cbfcecf9ccd2cbc9af8256d9bff9e40 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/restaurant" 
```
```javascript
const url = new URL("http://localhost/api/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/restaurant`


<!-- END_0cbfcecf9ccd2cbc9af8256d9bff9e40 -->

<!-- START_07f070cacc37652d7b2f89b7a7e6bc30 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/api/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "success",
    "data": {
        "restaurant": {
            "id": 1,
            "user_id": "5",
            "name": "KERALATASTE",
            "category": null,
            "takeaway": false,
            "delivery": true,
            "reserve": false,
            "county": null,
            "city": "Wellawatta",
            "province": "Western",
            "country": "Sri Lanka",
            "postcode": "00600",
            "phone": "01 44 90 09 07",
            "email": "keralataste@mail.com",
            "website": "keralataste.com",
            "description": null,
            "logo": "http:\/\/eatoeat-staging.club\/app\/restaurant\/logo\/restaurant1.jpg",
            "price_range": "1",
            "seats": null,
            "parking": "0",
            "subscription": null,
            "discount": true,
            "menu_discount": true,
            "promocode": true,
            "discount_type": "flat_rate",
            "discount_value": "10",
            "expiry_date": "2019-06-13 00:00:00",
            "allergy_information": null,
            "before_information": null,
            "online": "1",
            "created_at": "2019-05-29 13:50:00",
            "deleted_at": null,
            "updated_at": "2019-06-12 11:02:24",
            "things_to_know": null,
            "opening_hours": [
                {
                    "id": 125,
                    "restaurant_id": "1",
                    "day": "Monday",
                    "opening_time": "11 AM",
                    "closing_time": "11 PM",
                    "created_at": "2019-06-12 11:02:24",
                    "updated_at": "2019-06-12 11:02:24",
                    "deleted_at": null,
                    "opening": "11:00 AM",
                    "closing": "11:00 PM"
                },
                {
                    "id": 126,
                    "restaurant_id": "1",
                    "day": "Tuesday",
                    "opening_time": "11 AM",
                    "closing_time": "11 PM",
                    "created_at": "2019-06-12 11:02:24",
                    "updated_at": "2019-06-12 11:02:24",
                    "deleted_at": null,
                    "opening": "11:00 AM",
                    "closing": "11:00 PM"
                },
                {
                    "id": 127,
                    "restaurant_id": "1",
                    "day": "Wednesday",
                    "opening_time": "11 AM",
                    "closing_time": "11 PM",
                    "created_at": "2019-06-12 11:02:24",
                    "updated_at": "2019-06-12 11:02:24",
                    "deleted_at": null,
                    "opening": "11:00 AM",
                    "closing": "11:00 PM"
                },
                {
                    "id": 128,
                    "restaurant_id": "1",
                    "day": "Thursday",
                    "opening_time": "11 AM",
                    "closing_time": "11 PM",
                    "created_at": "2019-06-12 11:02:24",
                    "updated_at": "2019-06-12 11:02:24",
                    "deleted_at": null,
                    "opening": "11:00 AM",
                    "closing": "11:00 PM"
                },
                {
                    "id": 129,
                    "restaurant_id": "1",
                    "day": "Friday",
                    "opening_time": "11 AM",
                    "closing_time": "11 PM",
                    "created_at": "2019-06-12 11:02:24",
                    "updated_at": "2019-06-12 11:02:24",
                    "deleted_at": null,
                    "opening": "11:00 AM",
                    "closing": "11:00 PM"
                },
                {
                    "id": 130,
                    "restaurant_id": "1",
                    "day": "Saturday",
                    "opening_time": "11 AM",
                    "closing_time": "11 PM",
                    "created_at": "2019-06-12 11:02:24",
                    "updated_at": "2019-06-12 11:02:24",
                    "deleted_at": null,
                    "opening": "11:00 AM",
                    "closing": "11:00 PM"
                },
                {
                    "id": 131,
                    "restaurant_id": "1",
                    "day": "Sunday",
                    "opening_time": "11 AM",
                    "closing_time": "11 PM",
                    "created_at": "2019-06-12 11:02:24",
                    "updated_at": "2019-06-12 11:02:24",
                    "deleted_at": null,
                    "opening": "11:00 AM",
                    "closing": "11:00 PM"
                }
            ],
            "restaurant_menus": [
                {
                    "id": 1,
                    "restaurant_id": "1",
                    "name": "Poulet Tikka",
                    "created_at": "2019-05-29 11:20:06",
                    "updated_at": "2019-06-07 13:21:53",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 3,
                            "menu_id": "1",
                            "name": "Agneau Tikka",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image3.jpg",
                            "description": "Gigot d’agneau désossé Grillé",
                            "price": "8.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": "asdf",
                            "promo_type": "flat_rate",
                            "promo_value": "2",
                            "promo_usage": "1",
                            "promo_date": "2019-06-27 00:00:00",
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-06-12 11:15:30",
                            "deleted_at": null
                        },
                        {
                            "id": 5,
                            "menu_id": "1",
                            "name": "Gambas Grillé ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image5.jpg",
                            "description": "",
                            "price": "17.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null
                        },
                        {
                            "id": 8,
                            "menu_id": "1",
                            "name": "Grill Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image8.jpg",
                            "description": "cocktail d'entrées délicieusement concocté par le chef",
                            "price": "16.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null
                        },
                        {
                            "id": 9,
                            "menu_id": "1",
                            "name": "Samoussa Sabzi  ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image9.jpg",
                            "description": "Végétarien",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null
                        },
                        {
                            "id": 10,
                            "menu_id": "1",
                            "name": "Samoussa Bœuf ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image10.jpg",
                            "description": "Bœuf haché",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null
                        },
                        {
                            "id": 11,
                            "menu_id": "1",
                            "name": "Oignons bhaja ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image11.jpg",
                            "description": "lamelles d'oignons marinées aux épices variées, farine de pois chiche puis frites en beignets",
                            "price": "3.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null
                        },
                        {
                            "id": 12,
                            "menu_id": "1",
                            "name": "Choux-Fleurs",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image12.jpg",
                            "description": "Choux-fleurs frits aux épices de tandoori",
                            "price": "5.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-06-12 10:23:43",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 2,
                    "restaurant_id": "1",
                    "name": "Choux-Fleurs Masala ",
                    "created_at": "2019-05-29 11:22:00",
                    "updated_at": "2019-05-29 11:22:00",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 13,
                            "menu_id": "2",
                            "name": "Choux-Fleurs Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image13.jpg",
                            "description": "Choux-fleurs cuisinés aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "7.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null
                        },
                        {
                            "id": 14,
                            "menu_id": "2",
                            "name": "Channa Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image14.jpg",
                            "description": "Pois chiches cuisinés avec oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "7.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 15,
                            "menu_id": "2",
                            "name": "Paneer Tikka Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image15.jpg",
                            "description": "Morceaux de fromages indiens cuisinés avec oignons, tomates fraîches, ail, gingembre, épices et beurre indien",
                            "price": "9.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 16,
                            "menu_id": "2",
                            "name": "Palak Paneer ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image16.jpg",
                            "description": "Épinards cuisinés avec des oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "9.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 3,
                    "restaurant_id": "1",
                    "name": "Poulet Varuval ",
                    "created_at": "2019-05-29 11:22:00",
                    "updated_at": "2019-05-29 11:22:00",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 17,
                            "menu_id": "3",
                            "name": "Poulet Varuval ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image17.jpg",
                            "description": "Poulet cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "9.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 18,
                            "menu_id": "3",
                            "name": "Poulet Tikka Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image18.jpg",
                            "description": "Poulet grillé au tandoor cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "10.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 19,
                            "menu_id": "3",
                            "name": "Chili Chicken ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image19.jpg",
                            "description": "Poulet cuisiné aux oignons, poivrons, ail, piment vert, gingembre et épices",
                            "price": "10.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 20,
                            "menu_id": "3",
                            "name": "Poulet Korma ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image20.jpg",
                            "description": "Poulet cuisiné aux oignons, noix de cajou, lait de coco, ail, gingembre et épices",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 4,
                    "restaurant_id": "1",
                    "name": "Agneau Tikka Masala ",
                    "created_at": "2019-05-29 11:22:01",
                    "updated_at": "2019-05-29 11:22:01",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 21,
                            "menu_id": "4",
                            "name": "Agneau Tikka Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image21.jpg",
                            "description": "Agneau grillé au tandoor cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 22,
                            "menu_id": "4",
                            "name": "Agneau Kerala",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image22.jpg",
                            "description": "Agneau cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 23,
                            "menu_id": "4",
                            "name": "Agneau Palak ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image23.jpg",
                            "description": "Agneau cuisiné aux épices et épinards",
                            "price": "13",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 5,
                    "restaurant_id": "1",
                    "name": "Bœuf Massala ",
                    "created_at": "2019-05-29 11:22:02",
                    "updated_at": "2019-05-29 11:22:02",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 24,
                            "menu_id": "5",
                            "name": "Bœuf Massala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image24.jpg",
                            "description": "Bœuf cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null
                        },
                        {
                            "id": 25,
                            "menu_id": "5",
                            "name": "Bœuf Palak ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image25.jpg",
                            "description": "Agneau cuisiné aux épices et épinards",
                            "price": "13",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 26,
                            "menu_id": "5",
                            "name": "Bœuf Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image26.jpg",
                            "description": "Agneau cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 6,
                    "restaurant_id": "1",
                    "name": "Crevette Kerala ",
                    "created_at": "2019-05-29 11:22:02",
                    "updated_at": "2019-05-29 11:22:02",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 27,
                            "menu_id": "6",
                            "name": "Crevette Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image27.jpg",
                            "description": "Crevette cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 28,
                            "menu_id": "6",
                            "name": "Fish Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image28.jpg",
                            "description": "Poisson cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 29,
                            "menu_id": "6",
                            "name": "Gambas Tikka Massala",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image29.jpg",
                            "description": "Gambas grillé au tandoor cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "15.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 7,
                    "restaurant_id": "1",
                    "name": "Agneau Biryani ",
                    "created_at": "2019-05-29 11:22:02",
                    "updated_at": "2019-05-29 11:22:02",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 30,
                            "menu_id": "7",
                            "name": "Agneau Biryani",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image30.jpg",
                            "description": "",
                            "price": "14.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-06-05 10:20:56",
                            "deleted_at": null
                        },
                        {
                            "id": 31,
                            "menu_id": "7",
                            "name": "Bœuf Biryani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image31.jpg",
                            "description": "",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 32,
                            "menu_id": "7",
                            "name": "Crevette Biryani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image32.jpg",
                            "description": "",
                            "price": "14.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 33,
                            "menu_id": "7",
                            "name": "Poulet Biriyani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image33.jpg",
                            "description": "",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 34,
                            "menu_id": "7",
                            "name": "Légumes Biriyani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image34.jpg",
                            "description": "",
                            "price": "10.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 8,
                    "restaurant_id": "1",
                    "name": "Riz nature ",
                    "created_at": "2019-05-29 11:22:03",
                    "updated_at": "2019-05-29 11:22:03",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 35,
                            "menu_id": "8",
                            "name": "Riz nature ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image35.jpg",
                            "description": "basmati",
                            "price": "3.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 36,
                            "menu_id": "8",
                            "name": "Riz Safran ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image36.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 37,
                            "menu_id": "8",
                            "name": "Riz pullao ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image37.jpg",
                            "description": "Riz au petit pois",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 38,
                            "menu_id": "8",
                            "name": "Kuska ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image38.jpg",
                            "description": "Noix de cajou, rasin sec et des épices",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 9,
                    "restaurant_id": "1",
                    "name": "Nan nature ",
                    "created_at": "2019-05-29 11:22:04",
                    "updated_at": "2019-05-29 11:22:04",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 39,
                            "menu_id": "9",
                            "name": "Nan nature ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image39.jpg",
                            "description": "",
                            "price": "3.2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 40,
                            "menu_id": "9",
                            "name": "Nan fromage ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image40.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 41,
                            "menu_id": "9",
                            "name": "Nan à l’ail ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image41.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 42,
                            "menu_id": "9",
                            "name": "Chappatti ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image42.jpg",
                            "description": "",
                            "price": "3.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 43,
                            "menu_id": "9",
                            "name": "Parotta",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image43.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 10,
                    "restaurant_id": "1",
                    "name": "Gulab jamun ",
                    "created_at": "2019-05-29 11:22:05",
                    "updated_at": "2019-05-29 11:22:05",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 44,
                            "menu_id": "10",
                            "name": "Gulab jamun ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image44.jpg",
                            "description": "Beignets de semoule trempés dans du sirop",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 45,
                            "menu_id": "10",
                            "name": "Kulfi Mangue ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image45.jpg",
                            "description": "",
                            "price": "6",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 46,
                            "menu_id": "10",
                            "name": "Kulfi Pistache ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image46.jpg",
                            "description": "",
                            "price": "6",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 47,
                            "menu_id": "10",
                            "name": "Salade De Fruits",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image47.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 48,
                            "menu_id": "10",
                            "name": "Kesari ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image48.jpg",
                            "description": "Gateau de semoule",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 11,
                    "restaurant_id": "1",
                    "name": "Lassi nature ",
                    "created_at": "2019-05-29 11:22:06",
                    "updated_at": "2019-05-29 11:22:06",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 49,
                            "menu_id": "11",
                            "name": "Lassi nature ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image49.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 50,
                            "menu_id": "11",
                            "name": "Lassi salé ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image50.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 51,
                            "menu_id": "11",
                            "name": "Lassi sucré ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image1.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 52,
                            "menu_id": "11",
                            "name": "Lassi rose ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image2.jpg",
                            "description": "",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null
                        },
                        {
                            "id": 53,
                            "menu_id": "11",
                            "name": "Lassi Mangue ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image3.jpg",
                            "description": "",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 12,
                    "restaurant_id": "1",
                    "name": "Coca-cola 33 cl",
                    "created_at": "2019-05-29 11:22:06",
                    "updated_at": "2019-05-29 11:22:06",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 54,
                            "menu_id": "12",
                            "name": "Coca-cola 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image4.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 55,
                            "menu_id": "12",
                            "name": "Coca-cola zéro 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image5.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 56,
                            "menu_id": "12",
                            "name": "Orangina 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image6.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 57,
                            "menu_id": "12",
                            "name": "Oasis 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image7.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 58,
                            "menu_id": "12",
                            "name": "Perrier 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image8.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 59,
                            "menu_id": "12",
                            "name": "7up 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image9.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-06-07 13:21:43",
                            "deleted_at": null
                        },
                        {
                            "id": 60,
                            "menu_id": "12",
                            "name": "Jus de coco 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image10.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 61,
                            "menu_id": "12",
                            "name": "Ice tea 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image11.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 62,
                            "menu_id": "12",
                            "name": "Maxi coca-cola 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image12.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 63,
                            "menu_id": "12",
                            "name": "Maxi fanta 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image13.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 64,
                            "menu_id": "12",
                            "name": "Maxi orangina 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image14.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 65,
                            "menu_id": "12",
                            "name": "Maxi 7up 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image15.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 66,
                            "menu_id": "12",
                            "name": "Vittel 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image16.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 67,
                            "menu_id": "12",
                            "name": "Badoit 1 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image17.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 13,
                    "restaurant_id": "1",
                    "name": "Bière Heineken",
                    "created_at": "2019-05-29 11:22:08",
                    "updated_at": "2019-05-29 11:22:08",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 68,
                            "menu_id": "13",
                            "name": "Bière Heineken",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image18.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:08",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 69,
                            "menu_id": "13",
                            "name": "Bière corona",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image19.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:08",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 70,
                            "menu_id": "13",
                            "name": "Sol bière mexicaine",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image20.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 71,
                            "menu_id": "13",
                            "name": "Bordeaux supérieur AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image21.jpg",
                            "description": "",
                            "price": "15",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 72,
                            "menu_id": "13",
                            "name": "Saint Emilion AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image22.jpg",
                            "description": "",
                            "price": "22",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 73,
                            "menu_id": "13",
                            "name": "Côtes de Provence AOC 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image23.jpg",
                            "description": "",
                            "price": "12",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 74,
                            "menu_id": "13",
                            "name": "Touraine Gamay AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image24.jpg",
                            "description": "",
                            "price": "12",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 75,
                            "menu_id": "13",
                            "name": "Brouilly AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image25.jpg",
                            "description": "",
                            "price": "20",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 76,
                            "menu_id": "13",
                            "name": "Beaujolais Village AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image26.jpg",
                            "description": "",
                            "price": "16",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null
                        },
                        {
                            "id": 77,
                            "menu_id": "13",
                            "name": "Côtes de Provence AOC (rosé) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image27.jpg",
                            "description": "",
                            "price": "12",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null
                        },
                        {
                            "id": 78,
                            "menu_id": "13",
                            "name": "Tavel AOC (rosé) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image28.jpg",
                            "description": "",
                            "price": "16",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null
                        },
                        {
                            "id": 79,
                            "menu_id": "13",
                            "name": "Macon Village AOC (blanc) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image29.jpg",
                            "description": "",
                            "price": "17",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null
                        },
                        {
                            "id": 80,
                            "menu_id": "13",
                            "name": "Poully fumé AOC (blanc) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image30.jpg",
                            "description": "",
                            "price": "22",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null
                        },
                        {
                            "id": 81,
                            "menu_id": "13",
                            "name": "L.A.CETTO Rouge Vin Mexicain 75cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image31.jpg",
                            "description": "",
                            "price": "19",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null
                        },
                        {
                            "id": 82,
                            "menu_id": "13",
                            "name": "L.A.CETTO Rosé Vin Mexicain 75cl ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image32.jpg",
                            "description": "",
                            "price": "19",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null
                        }
                    ]
                }
            ],
            "url": "http:\/\/localhost\/restaurant\/1",
            "cuisines": [
                {
                    "id": 1,
                    "name": "Indian",
                    "logo": "cuisines\/image1.jpg",
                    "created_at": "2019-05-29 17:16:31",
                    "updated_at": "2019-05-29 17:16:31",
                    "deleted_at": null,
                    "pivot": {
                        "restaurant_id": "1",
                        "cuisine_id": "1",
                        "created_at": "2019-06-12 11:02:24",
                        "updated_at": "2019-06-12 11:02:24"
                    }
                }
            ],
            "delivery_locations": [
                {
                    "id": 22,
                    "restaurant_id": "1",
                    "postcode": "00600",
                    "delivery_time": "10",
                    "delivery_cost": "10",
                    "minimum_total": "10",
                    "free_delivery": "0",
                    "created_at": "2019-06-12 10:57:59",
                    "updated_at": "2019-06-12 10:57:59",
                    "deleted_at": null
                },
                {
                    "id": 23,
                    "restaurant_id": "1",
                    "postcode": "00790",
                    "delivery_time": "20",
                    "delivery_cost": "20",
                    "minimum_total": "50",
                    "free_delivery": "0",
                    "created_at": "2019-06-12 10:57:59",
                    "updated_at": "2019-06-12 10:57:59",
                    "deleted_at": null
                }
            ],
            "menus": [
                {
                    "id": 0,
                    "restaurant_id": 1,
                    "name": "Popular",
                    "created_at": "2019-06-12 11:31:23",
                    "updated_at": "2019-06-12 11:31:23",
                    "deleted_id": null,
                    "selected": true,
                    "menu_items": [
                        {
                            "id": 3,
                            "menu_id": "1",
                            "name": "Agneau Tikka",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image3.jpg",
                            "description": "Gigot d’agneau désossé Grillé",
                            "price": "8.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": "asdf",
                            "promo_type": "flat_rate",
                            "promo_value": "2",
                            "promo_usage": "1",
                            "promo_date": "2019-06-27 00:00:00",
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-06-12 11:15:30",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 5,
                            "menu_id": "1",
                            "name": "Gambas Grillé ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image5.jpg",
                            "description": "",
                            "price": "17.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ]
                },
                {
                    "id": 1,
                    "restaurant_id": "1",
                    "name": "Poulet Tikka",
                    "created_at": "2019-05-29 11:20:06",
                    "updated_at": "2019-06-07 13:21:53",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 3,
                            "menu_id": "1",
                            "name": "Agneau Tikka",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image3.jpg",
                            "description": "Gigot d’agneau désossé Grillé",
                            "price": "8.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": "asdf",
                            "promo_type": "flat_rate",
                            "promo_value": "2",
                            "promo_usage": "1",
                            "promo_date": "2019-06-27 00:00:00",
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-06-12 11:15:30",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 5,
                            "menu_id": "1",
                            "name": "Gambas Grillé ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image5.jpg",
                            "description": "",
                            "price": "17.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 8,
                            "menu_id": "1",
                            "name": "Grill Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image8.jpg",
                            "description": "cocktail d'entrées délicieusement concocté par le chef",
                            "price": "16.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 9,
                            "menu_id": "1",
                            "name": "Samoussa Sabzi  ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image9.jpg",
                            "description": "Végétarien",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 10,
                            "menu_id": "1",
                            "name": "Samoussa Bœuf ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image10.jpg",
                            "description": "Bœuf haché",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:21:59",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 11,
                            "menu_id": "1",
                            "name": "Oignons bhaja ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image11.jpg",
                            "description": "lamelles d'oignons marinées aux épices variées, farine de pois chiche puis frites en beignets",
                            "price": "3.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 12,
                            "menu_id": "1",
                            "name": "Choux-Fleurs",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image12.jpg",
                            "description": "Choux-fleurs frits aux épices de tandoori",
                            "price": "5.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-06-12 10:23:43",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 2,
                    "restaurant_id": "1",
                    "name": "Choux-Fleurs Masala ",
                    "created_at": "2019-05-29 11:22:00",
                    "updated_at": "2019-05-29 11:22:00",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 13,
                            "menu_id": "2",
                            "name": "Choux-Fleurs Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image13.jpg",
                            "description": "Choux-fleurs cuisinés aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "7.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:35",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 14,
                            "menu_id": "2",
                            "name": "Channa Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image14.jpg",
                            "description": "Pois chiches cuisinés avec oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "7.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 15,
                            "menu_id": "2",
                            "name": "Paneer Tikka Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image15.jpg",
                            "description": "Morceaux de fromages indiens cuisinés avec oignons, tomates fraîches, ail, gingembre, épices et beurre indien",
                            "price": "9.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 16,
                            "menu_id": "2",
                            "name": "Palak Paneer ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image16.jpg",
                            "description": "Épinards cuisinés avec des oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "9.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:00",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 3,
                    "restaurant_id": "1",
                    "name": "Poulet Varuval ",
                    "created_at": "2019-05-29 11:22:00",
                    "updated_at": "2019-05-29 11:22:00",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 17,
                            "menu_id": "3",
                            "name": "Poulet Varuval ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image17.jpg",
                            "description": "Poulet cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "9.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 18,
                            "menu_id": "3",
                            "name": "Poulet Tikka Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image18.jpg",
                            "description": "Poulet grillé au tandoor cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "10.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 19,
                            "menu_id": "3",
                            "name": "Chili Chicken ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image19.jpg",
                            "description": "Poulet cuisiné aux oignons, poivrons, ail, piment vert, gingembre et épices",
                            "price": "10.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 20,
                            "menu_id": "3",
                            "name": "Poulet Korma ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image20.jpg",
                            "description": "Poulet cuisiné aux oignons, noix de cajou, lait de coco, ail, gingembre et épices",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 4,
                    "restaurant_id": "1",
                    "name": "Agneau Tikka Masala ",
                    "created_at": "2019-05-29 11:22:01",
                    "updated_at": "2019-05-29 11:22:01",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 21,
                            "menu_id": "4",
                            "name": "Agneau Tikka Masala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image21.jpg",
                            "description": "Agneau grillé au tandoor cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 22,
                            "menu_id": "4",
                            "name": "Agneau Kerala",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image22.jpg",
                            "description": "Agneau cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:01",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 23,
                            "menu_id": "4",
                            "name": "Agneau Palak ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image23.jpg",
                            "description": "Agneau cuisiné aux épices et épinards",
                            "price": "13",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 5,
                    "restaurant_id": "1",
                    "name": "Bœuf Massala ",
                    "created_at": "2019-05-29 11:22:02",
                    "updated_at": "2019-05-29 11:22:02",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 24,
                            "menu_id": "5",
                            "name": "Bœuf Massala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image24.jpg",
                            "description": "Bœuf cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:36",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 25,
                            "menu_id": "5",
                            "name": "Bœuf Palak ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image25.jpg",
                            "description": "Agneau cuisiné aux épices et épinards",
                            "price": "13",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 26,
                            "menu_id": "5",
                            "name": "Bœuf Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image26.jpg",
                            "description": "Agneau cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 6,
                    "restaurant_id": "1",
                    "name": "Crevette Kerala ",
                    "created_at": "2019-05-29 11:22:02",
                    "updated_at": "2019-05-29 11:22:02",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 27,
                            "menu_id": "6",
                            "name": "Crevette Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image27.jpg",
                            "description": "Crevette cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 28,
                            "menu_id": "6",
                            "name": "Fish Kerala ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image28.jpg",
                            "description": "Poisson cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "12.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 29,
                            "menu_id": "6",
                            "name": "Gambas Tikka Massala",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image29.jpg",
                            "description": "Gambas grillé au tandoor cuisiné aux oignons, tomates fraîches, ail, gingembre et épices",
                            "price": "15.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 7,
                    "restaurant_id": "1",
                    "name": "Agneau Biryani ",
                    "created_at": "2019-05-29 11:22:02",
                    "updated_at": "2019-05-29 11:22:02",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 30,
                            "menu_id": "7",
                            "name": "Agneau Biryani",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image30.jpg",
                            "description": "",
                            "price": "14.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:02",
                            "updated_at": "2019-06-05 10:20:56",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 31,
                            "menu_id": "7",
                            "name": "Bœuf Biryani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image31.jpg",
                            "description": "",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 32,
                            "menu_id": "7",
                            "name": "Crevette Biryani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image32.jpg",
                            "description": "",
                            "price": "14.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 33,
                            "menu_id": "7",
                            "name": "Poulet Biriyani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image33.jpg",
                            "description": "",
                            "price": "11.9",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 34,
                            "menu_id": "7",
                            "name": "Légumes Biriyani ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image34.jpg",
                            "description": "",
                            "price": "10.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 8,
                    "restaurant_id": "1",
                    "name": "Riz nature ",
                    "created_at": "2019-05-29 11:22:03",
                    "updated_at": "2019-05-29 11:22:03",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 35,
                            "menu_id": "8",
                            "name": "Riz nature ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image35.jpg",
                            "description": "basmati",
                            "price": "3.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 36,
                            "menu_id": "8",
                            "name": "Riz Safran ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image36.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 37,
                            "menu_id": "8",
                            "name": "Riz pullao ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image37.jpg",
                            "description": "Riz au petit pois",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:03",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 38,
                            "menu_id": "8",
                            "name": "Kuska ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image38.jpg",
                            "description": "Noix de cajou, rasin sec et des épices",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 9,
                    "restaurant_id": "1",
                    "name": "Nan nature ",
                    "created_at": "2019-05-29 11:22:04",
                    "updated_at": "2019-05-29 11:22:04",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 39,
                            "menu_id": "9",
                            "name": "Nan nature ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image39.jpg",
                            "description": "",
                            "price": "3.2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 40,
                            "menu_id": "9",
                            "name": "Nan fromage ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image40.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 41,
                            "menu_id": "9",
                            "name": "Nan à l’ail ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image41.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 42,
                            "menu_id": "9",
                            "name": "Chappatti ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image42.jpg",
                            "description": "",
                            "price": "3.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:04",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 43,
                            "menu_id": "9",
                            "name": "Parotta",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image43.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 10,
                    "restaurant_id": "1",
                    "name": "Gulab jamun ",
                    "created_at": "2019-05-29 11:22:05",
                    "updated_at": "2019-05-29 11:22:05",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 44,
                            "menu_id": "10",
                            "name": "Gulab jamun ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image44.jpg",
                            "description": "Beignets de semoule trempés dans du sirop",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 45,
                            "menu_id": "10",
                            "name": "Kulfi Mangue ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image45.jpg",
                            "description": "",
                            "price": "6",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 46,
                            "menu_id": "10",
                            "name": "Kulfi Pistache ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image46.jpg",
                            "description": "",
                            "price": "6",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 47,
                            "menu_id": "10",
                            "name": "Salade De Fruits",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image47.jpg",
                            "description": "",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 48,
                            "menu_id": "10",
                            "name": "Kesari ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image48.jpg",
                            "description": "Gateau de semoule",
                            "price": "4.5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:05",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 11,
                    "restaurant_id": "1",
                    "name": "Lassi nature ",
                    "created_at": "2019-05-29 11:22:06",
                    "updated_at": "2019-05-29 11:22:06",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 49,
                            "menu_id": "11",
                            "name": "Lassi nature ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image49.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 50,
                            "menu_id": "11",
                            "name": "Lassi salé ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image50.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 51,
                            "menu_id": "11",
                            "name": "Lassi sucré ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image1.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 52,
                            "menu_id": "11",
                            "name": "Lassi rose ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image2.jpg",
                            "description": "",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:37",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 53,
                            "menu_id": "11",
                            "name": "Lassi Mangue ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image3.jpg",
                            "description": "",
                            "price": "5",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 12,
                    "restaurant_id": "1",
                    "name": "Coca-cola 33 cl",
                    "created_at": "2019-05-29 11:22:06",
                    "updated_at": "2019-05-29 11:22:06",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 54,
                            "menu_id": "12",
                            "name": "Coca-cola 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image4.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 55,
                            "menu_id": "12",
                            "name": "Coca-cola zéro 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image5.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 56,
                            "menu_id": "12",
                            "name": "Orangina 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image6.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 57,
                            "menu_id": "12",
                            "name": "Oasis 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image7.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:06",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 58,
                            "menu_id": "12",
                            "name": "Perrier 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image8.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 59,
                            "menu_id": "12",
                            "name": "7up 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image9.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-06-07 13:21:43",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 60,
                            "menu_id": "12",
                            "name": "Jus de coco 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image10.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 61,
                            "menu_id": "12",
                            "name": "Ice tea 33 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image11.jpg",
                            "description": "",
                            "price": "2",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 62,
                            "menu_id": "12",
                            "name": "Maxi coca-cola 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image12.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 63,
                            "menu_id": "12",
                            "name": "Maxi fanta 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image13.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 64,
                            "menu_id": "12",
                            "name": "Maxi orangina 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image14.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 65,
                            "menu_id": "12",
                            "name": "Maxi 7up 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image15.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 66,
                            "menu_id": "12",
                            "name": "Vittel 1,5 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image16.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 67,
                            "menu_id": "12",
                            "name": "Badoit 1 L",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image17.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:07",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                },
                {
                    "id": 13,
                    "restaurant_id": "1",
                    "name": "Bière Heineken",
                    "created_at": "2019-05-29 11:22:08",
                    "updated_at": "2019-05-29 11:22:08",
                    "deleted_at": null,
                    "menu_items": [
                        {
                            "id": 68,
                            "menu_id": "13",
                            "name": "Bière Heineken",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image18.jpg",
                            "description": "",
                            "price": "3",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:08",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 69,
                            "menu_id": "13",
                            "name": "Bière corona",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image19.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:08",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 70,
                            "menu_id": "13",
                            "name": "Sol bière mexicaine",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image20.jpg",
                            "description": "",
                            "price": "4",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 71,
                            "menu_id": "13",
                            "name": "Bordeaux supérieur AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image21.jpg",
                            "description": "",
                            "price": "15",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 72,
                            "menu_id": "13",
                            "name": "Saint Emilion AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image22.jpg",
                            "description": "",
                            "price": "22",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 73,
                            "menu_id": "13",
                            "name": "Côtes de Provence AOC 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image23.jpg",
                            "description": "",
                            "price": "12",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 74,
                            "menu_id": "13",
                            "name": "Touraine Gamay AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image24.jpg",
                            "description": "",
                            "price": "12",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 75,
                            "menu_id": "13",
                            "name": "Brouilly AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image25.jpg",
                            "description": "",
                            "price": "20",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 76,
                            "menu_id": "13",
                            "name": "Beaujolais Village AOC (rouge) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image26.jpg",
                            "description": "",
                            "price": "16",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:09",
                            "updated_at": "2019-05-29 12:35:38",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 77,
                            "menu_id": "13",
                            "name": "Côtes de Provence AOC (rosé) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image27.jpg",
                            "description": "",
                            "price": "12",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 78,
                            "menu_id": "13",
                            "name": "Tavel AOC (rosé) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image28.jpg",
                            "description": "",
                            "price": "16",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 79,
                            "menu_id": "13",
                            "name": "Macon Village AOC (blanc) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image29.jpg",
                            "description": "",
                            "price": "17",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 80,
                            "menu_id": "13",
                            "name": "Poully fumé AOC (blanc) 75 cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image30.jpg",
                            "description": "",
                            "price": "22",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 81,
                            "menu_id": "13",
                            "name": "L.A.CETTO Rouge Vin Mexicain 75cl",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image31.jpg",
                            "description": "",
                            "price": "19",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        },
                        {
                            "id": 82,
                            "menu_id": "13",
                            "name": "L.A.CETTO Rosé Vin Mexicain 75cl ",
                            "logo": "http:\/\/eatoeat-staging.club\/app\/cuisines\/image32.jpg",
                            "description": "",
                            "price": "19",
                            "delivery": true,
                            "takeaway": true,
                            "promo_code": null,
                            "promo_type": "flat_rate",
                            "promo_value": null,
                            "promo_usage": null,
                            "promo_date": null,
                            "created_at": "2019-05-29 11:22:10",
                            "updated_at": "2019-05-29 12:35:39",
                            "deleted_at": null,
                            "variants": [],
                            "addons": []
                        }
                    ],
                    "selected": false
                }
            ],
            "rating": 4,
            "review_count": 3,
            "pre_order_time": "Open",
            "reviews": [
                {
                    "id": 3,
                    "user_id": "4",
                    "restaurant_id": "1",
                    "rating": "3",
                    "review": "this is review",
                    "response": "thank you",
                    "created_at": "2019-06-03 13:07:11",
                    "updated_at": "2019-06-12 08:07:54",
                    "deleted_at": null,
                    "user": {
                        "id": 4,
                        "first_name": "Master",
                        "last_name": "Admin",
                        "location": null,
                        "email": "master@admin.com",
                        "role": "master_admin",
                        "phone": "1234567890",
                        "dining_location": null,
                        "requests": null,
                        "offer_emails": "0",
                        "restaurant_emails": "0",
                        "created_at": "2019-05-30 08:27:50",
                        "updated_at": "2019-06-04 07:57:14",
                        "deleted_at": null,
                        "country": "Sri Lanka",
                        "city": "Wellawatta",
                        "province": "sri lanka",
                        "postcode": "00600"
                    },
                    "date": "1 week ago"
                },
                {
                    "id": 4,
                    "user_id": "18",
                    "restaurant_id": "1",
                    "rating": "5",
                    "review": null,
                    "response": null,
                    "created_at": "2019-06-10 07:58:07",
                    "updated_at": "2019-06-10 07:58:07",
                    "deleted_at": null,
                    "user": {
                        "id": 18,
                        "first_name": "sandyyy",
                        "last_name": "yy",
                        "location": null,
                        "email": "sandy@gmail.com",
                        "role": null,
                        "phone": "1234567890",
                        "dining_location": "Colombo",
                        "requests": null,
                        "offer_emails": "1",
                        "restaurant_emails": "1",
                        "created_at": "2019-05-30 13:16:40",
                        "updated_at": "2019-06-07 18:15:53",
                        "deleted_at": null,
                        "country": null,
                        "city": null,
                        "province": null,
                        "postcode": null
                    },
                    "date": "2 days ago"
                },
                {
                    "id": 5,
                    "user_id": "18",
                    "restaurant_id": "1",
                    "rating": "5",
                    "review": "good",
                    "response": null,
                    "created_at": "2019-06-11 08:45:41",
                    "updated_at": "2019-06-11 08:45:41",
                    "deleted_at": null,
                    "user": {
                        "id": 18,
                        "first_name": "sandyyy",
                        "last_name": "yy",
                        "location": null,
                        "email": "sandy@gmail.com",
                        "role": null,
                        "phone": "1234567890",
                        "dining_location": "Colombo",
                        "requests": null,
                        "offer_emails": "1",
                        "restaurant_emails": "1",
                        "created_at": "2019-05-30 13:16:40",
                        "updated_at": "2019-06-07 18:15:53",
                        "deleted_at": null,
                        "country": null,
                        "city": null,
                        "province": null,
                        "postcode": null
                    },
                    "date": "1 day ago"
                }
            ],
            "user": false,
            "query_address": "Wellawatta+Western++00600",
            "free_delivery": "",
            "delivery_time": "",
            "minimum_total": "",
            "delivery_minutes": 30,
            "current_time": "2019-06-12 11:31:23",
            "clock_minutes": 31,
            "areas": [
                {
                    "id": 22,
                    "restaurant_id": "1",
                    "postcode": "00600",
                    "delivery_time": "10",
                    "delivery_cost": "10",
                    "minimum_total": "10",
                    "free_delivery": "0",
                    "created_at": "2019-06-12 10:57:59",
                    "updated_at": "2019-06-12 10:57:59",
                    "deleted_at": null
                },
                {
                    "id": 23,
                    "restaurant_id": "1",
                    "postcode": "00790",
                    "delivery_time": "20",
                    "delivery_cost": "20",
                    "minimum_total": "50",
                    "free_delivery": "0",
                    "created_at": "2019-06-12 10:57:59",
                    "updated_at": "2019-06-12 10:57:59",
                    "deleted_at": null
                }
            ],
            "media": [
                {
                    "id": 1,
                    "restaurant_id": "1",
                    "name": "KERALATASTE",
                    "path": "http:\/\/eatoeat-staging.club\/app\/restaurant\/slider\/slider1.jpg",
                    "created_at": "2019-05-29 13:40:44",
                    "updated_at": "2019-05-29 13:40:44",
                    "deleted_at": null
                },
                {
                    "id": 2,
                    "restaurant_id": "1",
                    "name": "KERALATASTE",
                    "path": "http:\/\/eatoeat-staging.club\/app\/restaurant\/slider\/slider2.jpg",
                    "created_at": "2019-05-29 13:40:44",
                    "updated_at": "2019-05-29 13:40:44",
                    "deleted_at": null
                },
                {
                    "id": 27,
                    "restaurant_id": "1",
                    "name": "KERALATASTE",
                    "path": "http:\/\/eatoeat-staging.club\/app\/restaurant\/slider\/slider3.jpg",
                    "created_at": "2019-05-29 13:50:25",
                    "updated_at": "2019-05-29 13:50:25",
                    "deleted_at": null
                },
                {
                    "id": 28,
                    "restaurant_id": "1",
                    "name": "KERALATASTE",
                    "path": "http:\/\/eatoeat-staging.club\/app\/restaurant\/slider\/slider4.jpg",
                    "created_at": "2019-05-29 13:50:25",
                    "updated_at": "2019-05-29 13:50:25",
                    "deleted_at": null
                }
            ],
            "takeaway_locations": [
                {
                    "id": 6,
                    "restaurant_id": "1",
                    "postcode": "00600",
                    "preparation_time": "10",
                    "created_at": "2019-06-10 08:06:04",
                    "updated_at": "2019-06-10 08:06:04",
                    "deleted_at": null
                }
            ]
        },
        "payment_methods": [
            {
                "id": 1,
                "name": "VISA",
                "logo": null,
                "created_at": "2019-06-04 07:46:46",
                "updated_at": "2019-06-04 07:46:46"
            }
        ],
        "cart_date": "2019-06-12",
        "cart_time": "12:03 PM"
    }
}
```

### HTTP Request
`GET api/restaurant/{restaurant}`


<!-- END_07f070cacc37652d7b2f89b7a7e6bc30 -->

<!-- START_8117f6d278919d9490d5d8a1f5f43c51 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/restaurant/1/edit" 
```
```javascript
const url = new URL("http://localhost/api/restaurant/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/restaurant/{restaurant}/edit`


<!-- END_8117f6d278919d9490d5d8a1f5f43c51 -->

<!-- START_723d9485e919b3f979017b588f43631d -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/api/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/restaurant/{restaurant}`

`PATCH api/restaurant/{restaurant}`


<!-- END_723d9485e919b3f979017b588f43631d -->

<!-- START_4a179247e830a0fb91b2dae1d57d4750 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/api/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/restaurant/{restaurant}`


<!-- END_4a179247e830a0fb91b2dae1d57d4750 -->

<!-- START_f0654d3f2fc63c11f5723f233cc53c83 -->
## api/user
> Example request:

```bash
curl -X POST "http://localhost/api/user" 
```
```javascript
const url = new URL("http://localhost/api/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/user`


<!-- END_f0654d3f2fc63c11f5723f233cc53c83 -->

<!-- START_2754857aaac2f36f8ecfa54b77c3362b -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/review" 
```
```javascript
const url = new URL("http://localhost/api/review");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "success",
    "data": {
        "reviews": [
            {
                "id": 5,
                "user_id": "18",
                "restaurant_id": "1",
                "rating": "5",
                "review": "good",
                "response": null,
                "created_at": "2019-06-11 08:45:41",
                "updated_at": "2019-06-11 08:45:41",
                "deleted_at": null,
                "user": {
                    "id": 18,
                    "first_name": "sandyyy",
                    "last_name": "yy",
                    "location": null,
                    "email": "sandy@gmail.com",
                    "role": null,
                    "phone": "1234567890",
                    "dining_location": "Colombo",
                    "requests": null,
                    "offer_emails": "1",
                    "restaurant_emails": "1",
                    "created_at": "2019-05-30 13:16:40",
                    "updated_at": "2019-06-07 18:15:53",
                    "deleted_at": null,
                    "country": null,
                    "city": null,
                    "province": null,
                    "postcode": null
                }
            },
            {
                "id": 4,
                "user_id": "18",
                "restaurant_id": "1",
                "rating": "5",
                "review": null,
                "response": null,
                "created_at": "2019-06-10 07:58:07",
                "updated_at": "2019-06-10 07:58:07",
                "deleted_at": null,
                "user": {
                    "id": 18,
                    "first_name": "sandyyy",
                    "last_name": "yy",
                    "location": null,
                    "email": "sandy@gmail.com",
                    "role": null,
                    "phone": "1234567890",
                    "dining_location": "Colombo",
                    "requests": null,
                    "offer_emails": "1",
                    "restaurant_emails": "1",
                    "created_at": "2019-05-30 13:16:40",
                    "updated_at": "2019-06-07 18:15:53",
                    "deleted_at": null,
                    "country": null,
                    "city": null,
                    "province": null,
                    "postcode": null
                }
            },
            {
                "id": 3,
                "user_id": "4",
                "restaurant_id": "1",
                "rating": "3",
                "review": "this is review",
                "response": "thank you",
                "created_at": "2019-06-03 13:07:11",
                "updated_at": "2019-06-12 08:07:54",
                "deleted_at": null,
                "user": {
                    "id": 4,
                    "first_name": "Master",
                    "last_name": "Admin",
                    "location": null,
                    "email": "master@admin.com",
                    "role": "master_admin",
                    "phone": "1234567890",
                    "dining_location": null,
                    "requests": null,
                    "offer_emails": "0",
                    "restaurant_emails": "0",
                    "created_at": "2019-05-30 08:27:50",
                    "updated_at": "2019-06-04 07:57:14",
                    "deleted_at": null,
                    "country": "Sri Lanka",
                    "city": "Wellawatta",
                    "province": "sri lanka",
                    "postcode": "00600"
                }
            },
            {
                "id": 2,
                "user_id": "18",
                "restaurant_id": "11",
                "rating": "5",
                "review": "good",
                "response": null,
                "created_at": "2019-05-30 13:22:05",
                "updated_at": "2019-05-30 13:22:05",
                "deleted_at": null,
                "user": {
                    "id": 18,
                    "first_name": "sandyyy",
                    "last_name": "yy",
                    "location": null,
                    "email": "sandy@gmail.com",
                    "role": null,
                    "phone": "1234567890",
                    "dining_location": "Colombo",
                    "requests": null,
                    "offer_emails": "1",
                    "restaurant_emails": "1",
                    "created_at": "2019-05-30 13:16:40",
                    "updated_at": "2019-06-07 18:15:53",
                    "deleted_at": null,
                    "country": null,
                    "city": null,
                    "province": null,
                    "postcode": null
                }
            },
            {
                "id": 1,
                "user_id": "18",
                "restaurant_id": "11",
                "rating": "5",
                "review": "good",
                "response": null,
                "created_at": "2019-05-30 13:21:51",
                "updated_at": "2019-05-30 13:21:51",
                "deleted_at": null,
                "user": {
                    "id": 18,
                    "first_name": "sandyyy",
                    "last_name": "yy",
                    "location": null,
                    "email": "sandy@gmail.com",
                    "role": null,
                    "phone": "1234567890",
                    "dining_location": "Colombo",
                    "requests": null,
                    "offer_emails": "1",
                    "restaurant_emails": "1",
                    "created_at": "2019-05-30 13:16:40",
                    "updated_at": "2019-06-07 18:15:53",
                    "deleted_at": null,
                    "country": null,
                    "city": null,
                    "province": null,
                    "postcode": null
                }
            }
        ],
        "rating": "5",
        "percentages": {
            "1": 0,
            "2": 0,
            "3": 20,
            "4": 0,
            "5": 80
        }
    }
}
```

### HTTP Request
`GET api/review`


<!-- END_2754857aaac2f36f8ecfa54b77c3362b -->

<!-- START_3e89affc00678ae6402d4e91d0072a4f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/address" 
```
```javascript
const url = new URL("http://localhost/api/address");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/address`


<!-- END_3e89affc00678ae6402d4e91d0072a4f -->

<!-- START_6251cf5d7f3f31814e2523c8c2c02d30 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/address/create" 
```
```javascript
const url = new URL("http://localhost/api/address/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/address/create`


<!-- END_6251cf5d7f3f31814e2523c8c2c02d30 -->

<!-- START_56a3d62a5759f4f59b42a3732b8ba8e3 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/address" 
```
```javascript
const url = new URL("http://localhost/api/address");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/address`


<!-- END_56a3d62a5759f4f59b42a3732b8ba8e3 -->

<!-- START_931c4a4dc2f4c4ff26ad9e085dc47fa6 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/address/1" 
```
```javascript
const url = new URL("http://localhost/api/address/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/address/{address}`


<!-- END_931c4a4dc2f4c4ff26ad9e085dc47fa6 -->

<!-- START_621dad90d0371d0325c20b70e30db17d -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/address/1/edit" 
```
```javascript
const url = new URL("http://localhost/api/address/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/address/{address}/edit`


<!-- END_621dad90d0371d0325c20b70e30db17d -->

<!-- START_459bbf3a84f4048ddc40c9deaed665ea -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/address/1" 
```
```javascript
const url = new URL("http://localhost/api/address/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/address/{address}`

`PATCH api/address/{address}`


<!-- END_459bbf3a84f4048ddc40c9deaed665ea -->

<!-- START_8ea6d34a23eeff2623af9ad9ae1b407e -->
## api/address/{address}
> Example request:

```bash
curl -X DELETE "http://localhost/api/address/1" 
```
```javascript
const url = new URL("http://localhost/api/address/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/address/{address}`


<!-- END_8ea6d34a23eeff2623af9ad9ae1b407e -->

<!-- START_bfaad07ba1009e3de05985a50fc84305 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/reservation" 
```
```javascript
const url = new URL("http://localhost/api/reservation");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/reservation`


<!-- END_bfaad07ba1009e3de05985a50fc84305 -->

<!-- START_26c4d766b6c1680db8ce0d239ab76e9c -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/reservation/create" 
```
```javascript
const url = new URL("http://localhost/api/reservation/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/reservation/create`


<!-- END_26c4d766b6c1680db8ce0d239ab76e9c -->

<!-- START_b3690c7ef85bf04953f7239f2f81e903 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/reservation" 
```
```javascript
const url = new URL("http://localhost/api/reservation");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/reservation`


<!-- END_b3690c7ef85bf04953f7239f2f81e903 -->

<!-- START_b074ba85089bf40d052b739917024858 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/reservation/1" 
```
```javascript
const url = new URL("http://localhost/api/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/reservation/{reservation}`


<!-- END_b074ba85089bf40d052b739917024858 -->

<!-- START_e302e6f1f3b59696bf3b82b8ec24adb9 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/reservation/1/edit" 
```
```javascript
const url = new URL("http://localhost/api/reservation/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/reservation/{reservation}/edit`


<!-- END_e302e6f1f3b59696bf3b82b8ec24adb9 -->

<!-- START_2724c288d337bf956d4673136743349c -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/reservation/1" 
```
```javascript
const url = new URL("http://localhost/api/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/reservation/{reservation}`

`PATCH api/reservation/{reservation}`


<!-- END_2724c288d337bf956d4673136743349c -->

<!-- START_5c4c596c4bce0defca6776b8b9c35aef -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/reservation/1" 
```
```javascript
const url = new URL("http://localhost/api/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/reservation/{reservation}`


<!-- END_5c4c596c4bce0defca6776b8b9c35aef -->

<!-- START_7e997cc9b64c8facc80f578ace24baf7 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/delivery" 
```
```javascript
const url = new URL("http://localhost/api/delivery");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/delivery`


<!-- END_7e997cc9b64c8facc80f578ace24baf7 -->

<!-- START_13bd823fabe3a277af366fe7c05a825b -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/delivery/create" 
```
```javascript
const url = new URL("http://localhost/api/delivery/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/delivery/create`


<!-- END_13bd823fabe3a277af366fe7c05a825b -->

<!-- START_abf92ac791b9817d3f5c21274c471e87 -->
## api/delivery
> Example request:

```bash
curl -X POST "http://localhost/api/delivery" 
```
```javascript
const url = new URL("http://localhost/api/delivery");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/delivery`


<!-- END_abf92ac791b9817d3f5c21274c471e87 -->

<!-- START_66840733f283774c01791b0a7df74406 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/delivery/1" 
```
```javascript
const url = new URL("http://localhost/api/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/delivery/{delivery}`


<!-- END_66840733f283774c01791b0a7df74406 -->

<!-- START_a393e82477fdc24562f2dd8d0ca1a649 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/delivery/1/edit" 
```
```javascript
const url = new URL("http://localhost/api/delivery/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/delivery/{delivery}/edit`


<!-- END_a393e82477fdc24562f2dd8d0ca1a649 -->

<!-- START_135413e1760c30abe3d39cadc6c0b7a7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/delivery/1" 
```
```javascript
const url = new URL("http://localhost/api/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/delivery/{delivery}`

`PATCH api/delivery/{delivery}`


<!-- END_135413e1760c30abe3d39cadc6c0b7a7 -->

<!-- START_9d51d5227471cffbca59cccebfaa3ca8 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/delivery/1" 
```
```javascript
const url = new URL("http://localhost/api/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/delivery/{delivery}`


<!-- END_9d51d5227471cffbca59cccebfaa3ca8 -->

<!-- START_75817c0c79ac3a713b1ff62e76a50089 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/takeaway" 
```
```javascript
const url = new URL("http://localhost/api/takeaway");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/takeaway`


<!-- END_75817c0c79ac3a713b1ff62e76a50089 -->

<!-- START_66523190d87f8caa889b02bbf7c48dd4 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/takeaway/create" 
```
```javascript
const url = new URL("http://localhost/api/takeaway/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/takeaway/create`


<!-- END_66523190d87f8caa889b02bbf7c48dd4 -->

<!-- START_b511ab7462aa0937a24bc322feac9237 -->
## api/takeaway
> Example request:

```bash
curl -X POST "http://localhost/api/takeaway" 
```
```javascript
const url = new URL("http://localhost/api/takeaway");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/takeaway`


<!-- END_b511ab7462aa0937a24bc322feac9237 -->

<!-- START_09b7a967519a70c3ba22c532aede608a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/api/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/takeaway/{takeaway}`


<!-- END_09b7a967519a70c3ba22c532aede608a -->

<!-- START_46ec9615a5bc923e9c2fb5c565fa2268 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/takeaway/1/edit" 
```
```javascript
const url = new URL("http://localhost/api/takeaway/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/takeaway/{takeaway}/edit`


<!-- END_46ec9615a5bc923e9c2fb5c565fa2268 -->

<!-- START_45e5d50ab7c0ba0c7fe4903d4ec23c47 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/api/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/takeaway/{takeaway}`

`PATCH api/takeaway/{takeaway}`


<!-- END_45e5d50ab7c0ba0c7fe4903d4ec23c47 -->

<!-- START_f3cb964729cfada32e0c3fbe61f61c42 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/api/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/takeaway/{takeaway}`


<!-- END_f3cb964729cfada32e0c3fbe61f61c42 -->

<!-- START_0539f4b352bf869de3ff9aa3ccfcaf6f -->
## api/restaurant/favourite
> Example request:

```bash
curl -X POST "http://localhost/api/restaurant/favourite" 
```
```javascript
const url = new URL("http://localhost/api/restaurant/favourite");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/restaurant/favourite`


<!-- END_0539f4b352bf869de3ff9aa3ccfcaf6f -->

<!-- START_6a393950d71b10473b47902098229a25 -->
## api/user/user
> Example request:

```bash
curl -X GET -G "http://localhost/api/user/user" 
```
```javascript
const url = new URL("http://localhost/api/user/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/user`


<!-- END_6a393950d71b10473b47902098229a25 -->

<!-- START_6073637aef0de196c06205ca9f1664ca -->
## api/user/favourites
> Example request:

```bash
curl -X GET -G "http://localhost/api/user/favourites" 
```
```javascript
const url = new URL("http://localhost/api/user/favourites");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/favourites`


<!-- END_6073637aef0de196c06205ca9f1664ca -->

<!-- START_23c337576e3e23b796184906f8f4e30a -->
## api/user/order
> Example request:

```bash
curl -X GET -G "http://localhost/api/user/order" 
```
```javascript
const url = new URL("http://localhost/api/user/order");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/order`


<!-- END_23c337576e3e23b796184906f8f4e30a -->

<!-- START_ceec0e0b1d13d731ad96603d26bccc2f -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/user/1" 
```
```javascript
const url = new URL("http://localhost/api/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user/{user}`


<!-- END_ceec0e0b1d13d731ad96603d26bccc2f -->

<!-- START_a4a2abed1e8e8cad5e6a3282812fe3f3 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/user/1" 
```
```javascript
const url = new URL("http://localhost/api/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/user/{user}`

`PATCH api/user/{user}`


<!-- END_a4a2abed1e8e8cad5e6a3282812fe3f3 -->

<!-- START_59ad28c6b6c5ba495ef823bb089bbbc3 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/review" 
```
```javascript
const url = new URL("http://localhost/api/review");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/review`


<!-- END_59ad28c6b6c5ba495ef823bb089bbbc3 -->

<!-- START_11b833320d2655dee0464ed3ca3c4669 -->
## api/promotion/validate
> Example request:

```bash
curl -X POST "http://localhost/api/promotion/validate" 
```
```javascript
const url = new URL("http://localhost/api/promotion/validate");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/promotion/validate`


<!-- END_11b833320d2655dee0464ed3ca3c4669 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://localhost/login" 
```
```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://localhost/login" 
```
```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## logout
> Example request:

```bash
curl -X POST "http://localhost/logout" 
```
```javascript
const url = new URL("http://localhost/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://localhost/register" 
```
```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://localhost/register" 
```
```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset" 
```
```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://localhost/password/email" 
```
```javascript
const url = new URL("http://localhost/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset/1" 
```
```javascript
const url = new URL("http://localhost/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://localhost/password/reset" 
```
```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_3df60941cfb1a1e5fe4feb953f3dd322 -->
## auth/sign-up/validate
> Example request:

```bash
curl -X POST "http://localhost/auth/sign-up/validate" 
```
```javascript
const url = new URL("http://localhost/auth/sign-up/validate");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST auth/sign-up/validate`


<!-- END_3df60941cfb1a1e5fe4feb953f3dd322 -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## /
> Example request:

```bash
curl -X GET -G "http://localhost/" 
```
```javascript
const url = new URL("http://localhost/");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_918faee335732fef26eb8e7ad03dd8c3 -->
## about-us
> Example request:

```bash
curl -X GET -G "http://localhost/about-us" 
```
```javascript
const url = new URL("http://localhost/about-us");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET about-us`


<!-- END_918faee335732fef26eb8e7ad03dd8c3 -->

<!-- START_edce5abaae0423582f973aa228d48044 -->
## blog
> Example request:

```bash
curl -X GET -G "http://localhost/blog" 
```
```javascript
const url = new URL("http://localhost/blog");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET blog`


<!-- END_edce5abaae0423582f973aa228d48044 -->

<!-- START_19a827b23fec400624784ed7b7b6edc0 -->
## careers
> Example request:

```bash
curl -X GET -G "http://localhost/careers" 
```
```javascript
const url = new URL("http://localhost/careers");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET careers`


<!-- END_19a827b23fec400624784ed7b7b6edc0 -->

<!-- START_06713d5956317791dd44c58189de8920 -->
## press
> Example request:

```bash
curl -X GET -G "http://localhost/press" 
```
```javascript
const url = new URL("http://localhost/press");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET press`


<!-- END_06713d5956317791dd44c58189de8920 -->

<!-- START_cbbc3816116fe0b20a9c760c1e18d13d -->
## faq
> Example request:

```bash
curl -X GET -G "http://localhost/faq" 
```
```javascript
const url = new URL("http://localhost/faq");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET faq`


<!-- END_cbbc3816116fe0b20a9c760c1e18d13d -->

<!-- START_d92082701245b359dc02fac2ebe3615d -->
## contact-us
> Example request:

```bash
curl -X GET -G "http://localhost/contact-us" 
```
```javascript
const url = new URL("http://localhost/contact-us");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET contact-us`


<!-- END_d92082701245b359dc02fac2ebe3615d -->

<!-- START_a5ba781ba6e9791c5fbc373d463603ad -->
## contact/post
> Example request:

```bash
curl -X POST "http://localhost/contact/post" 
```
```javascript
const url = new URL("http://localhost/contact/post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST contact/post`


<!-- END_a5ba781ba6e9791c5fbc373d463603ad -->

<!-- START_e151a76ae0a998bd9881c61614beb120 -->
## why-eatoeat
> Example request:

```bash
curl -X GET -G "http://localhost/why-eatoeat" 
```
```javascript
const url = new URL("http://localhost/why-eatoeat");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET why-eatoeat`


<!-- END_e151a76ae0a998bd9881c61614beb120 -->

<!-- START_21a5713b1c1bac12c5a3254a443035bc -->
## cancellations-and-refunds
> Example request:

```bash
curl -X GET -G "http://localhost/cancellations-and-refunds" 
```
```javascript
const url = new URL("http://localhost/cancellations-and-refunds");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET cancellations-and-refunds`


<!-- END_21a5713b1c1bac12c5a3254a443035bc -->

<!-- START_9b6cd8a2c678d160fb0a62baae46d8bc -->
## terms-and-conditions
> Example request:

```bash
curl -X GET -G "http://localhost/terms-and-conditions" 
```
```javascript
const url = new URL("http://localhost/terms-and-conditions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET terms-and-conditions`


<!-- END_9b6cd8a2c678d160fb0a62baae46d8bc -->

<!-- START_3a8259abf1d6f5c6d47f1d16e36f8d55 -->
## privacy-policy
> Example request:

```bash
curl -X GET -G "http://localhost/privacy-policy" 
```
```javascript
const url = new URL("http://localhost/privacy-policy");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET privacy-policy`


<!-- END_3a8259abf1d6f5c6d47f1d16e36f8d55 -->

<!-- START_c0f505b72e10817948e65eb5eb744708 -->
## search
> Example request:

```bash
curl -X GET -G "http://localhost/search" 
```
```javascript
const url = new URL("http://localhost/search");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET search`


<!-- END_c0f505b72e10817948e65eb5eb744708 -->

<!-- START_f41c4d77904a44201b7a63a56bd2b365 -->
## landing
> Example request:

```bash
curl -X GET -G "http://localhost/landing" 
```
```javascript
const url = new URL("http://localhost/landing");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET landing`


<!-- END_f41c4d77904a44201b7a63a56bd2b365 -->

<!-- START_2c8610eaeb8efe4f640bbc72e7e6db20 -->
## restaurant
> Example request:

```bash
curl -X GET -G "http://localhost/restaurant" 
```
```javascript
const url = new URL("http://localhost/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET restaurant`


<!-- END_2c8610eaeb8efe4f640bbc72e7e6db20 -->

<!-- START_a0d2c5516ab499c6985c20993a4742be -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/restaurant/create" 
```
```javascript
const url = new URL("http://localhost/restaurant/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET restaurant/create`


<!-- END_a0d2c5516ab499c6985c20993a4742be -->

<!-- START_b9956300aac3d3ae02a65395e54c9afe -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/restaurant" 
```
```javascript
const url = new URL("http://localhost/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST restaurant`


<!-- END_b9956300aac3d3ae02a65395e54c9afe -->

<!-- START_08ca9bc1aa847e06339651359d22b871 -->
## restaurant/{restaurant}
> Example request:

```bash
curl -X GET -G "http://localhost/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET restaurant/{restaurant}`


<!-- END_08ca9bc1aa847e06339651359d22b871 -->

<!-- START_eca3bac175a5c8933ff91c72ffde89fa -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/restaurant/1/edit" 
```
```javascript
const url = new URL("http://localhost/restaurant/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET restaurant/{restaurant}/edit`


<!-- END_eca3bac175a5c8933ff91c72ffde89fa -->

<!-- START_02574398f1d64583fce1577945d2f2c1 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT restaurant/{restaurant}`

`PATCH restaurant/{restaurant}`


<!-- END_02574398f1d64583fce1577945d2f2c1 -->

<!-- START_ec79210ee35d871c565d5ab440bc6d73 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE restaurant/{restaurant}`


<!-- END_ec79210ee35d871c565d5ab440bc6d73 -->

<!-- START_3ff9c3e6c9290d8379b484a2d8b16296 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/cuisine" 
```
```javascript
const url = new URL("http://localhost/cuisine");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET cuisine`


<!-- END_3ff9c3e6c9290d8379b484a2d8b16296 -->

<!-- START_dca4da394d16ba5cd6bb4fec8c9d2603 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/cuisine/create" 
```
```javascript
const url = new URL("http://localhost/cuisine/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET cuisine/create`


<!-- END_dca4da394d16ba5cd6bb4fec8c9d2603 -->

<!-- START_b3fce5b973f7a3e5e6ca9373d8052378 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/cuisine" 
```
```javascript
const url = new URL("http://localhost/cuisine");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST cuisine`


<!-- END_b3fce5b973f7a3e5e6ca9373d8052378 -->

<!-- START_847cfe522a19ff156c69b5bb50e40b3e -->
## cuisine/{cuisine}
> Example request:

```bash
curl -X GET -G "http://localhost/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET cuisine/{cuisine}`


<!-- END_847cfe522a19ff156c69b5bb50e40b3e -->

<!-- START_35246bfeaa8822ff7d7e9bf62a473df5 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/cuisine/1/edit" 
```
```javascript
const url = new URL("http://localhost/cuisine/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET cuisine/{cuisine}/edit`


<!-- END_35246bfeaa8822ff7d7e9bf62a473df5 -->

<!-- START_e63dcae87d430dc829322e65f6e7fb1e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT cuisine/{cuisine}`

`PATCH cuisine/{cuisine}`


<!-- END_e63dcae87d430dc829322e65f6e7fb1e -->

<!-- START_c1ff0da9f02daa4870505e166560ff91 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE cuisine/{cuisine}`


<!-- END_c1ff0da9f02daa4870505e166560ff91 -->

<!-- START_a05e2e3c3e649401633a5d492a0f78fb -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/cart" 
```
```javascript
const url = new URL("http://localhost/cart");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET cart`


<!-- END_a05e2e3c3e649401633a5d492a0f78fb -->

<!-- START_b170ff89d0a34e58cd565c86bb7bebd5 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/cart/create" 
```
```javascript
const url = new URL("http://localhost/cart/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET cart/create`


<!-- END_b170ff89d0a34e58cd565c86bb7bebd5 -->

<!-- START_ec84d824c4cb65ef97f310cf630ce77f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/cart" 
```
```javascript
const url = new URL("http://localhost/cart");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST cart`


<!-- END_ec84d824c4cb65ef97f310cf630ce77f -->

<!-- START_bc025cdc247777d538d4d755ff35b54d -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/cart/1" 
```
```javascript
const url = new URL("http://localhost/cart/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [App\\Cart]."
}
```

### HTTP Request
`GET cart/{cart}`


<!-- END_bc025cdc247777d538d4d755ff35b54d -->

<!-- START_c02094d6904e5daaac209a00adb3fdde -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/cart/1/edit" 
```
```javascript
const url = new URL("http://localhost/cart/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "message": "No query results for model [App\\Cart]."
}
```

### HTTP Request
`GET cart/{cart}/edit`


<!-- END_c02094d6904e5daaac209a00adb3fdde -->

<!-- START_8c7b719f5bf3eba8867d0eb99c4a2e0a -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/cart/1" 
```
```javascript
const url = new URL("http://localhost/cart/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT cart/{cart}`

`PATCH cart/{cart}`


<!-- END_8c7b719f5bf3eba8867d0eb99c4a2e0a -->

<!-- START_81dc1aa2680c42556913b315f3d768a3 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/cart/1" 
```
```javascript
const url = new URL("http://localhost/cart/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE cart/{cart}`


<!-- END_81dc1aa2680c42556913b315f3d768a3 -->

<!-- START_5dfa159c8a1a5fd7f176938a7da5f2ce -->
## location
> Example request:

```bash
curl -X POST "http://localhost/location" 
```
```javascript
const url = new URL("http://localhost/location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST location`


<!-- END_5dfa159c8a1a5fd7f176938a7da5f2ce -->

<!-- START_43f822af3d3924b53df8c65cf3242dc4 -->
## master-admin/landing
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/landing" 
```
```javascript
const url = new URL("http://localhost/master-admin/landing");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET master-admin/landing`


<!-- END_43f822af3d3924b53df8c65cf3242dc4 -->

<!-- START_3bbf42ee3b92bd773602ff7351ca8e5f -->
## user/favourite
> Example request:

```bash
curl -X POST "http://localhost/user/favourite" 
```
```javascript
const url = new URL("http://localhost/user/favourite");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user/favourite`


<!-- END_3bbf42ee3b92bd773602ff7351ca8e5f -->

<!-- START_61ac46e488e5a240bbd2f2bc1ba06f56 -->
## user/favourites
> Example request:

```bash
curl -X GET -G "http://localhost/user/favourites" 
```
```javascript
const url = new URL("http://localhost/user/favourites");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/favourites`


<!-- END_61ac46e488e5a240bbd2f2bc1ba06f56 -->

<!-- START_0a204c2983a84810b8559b370fd7a4ac -->
## user/deliveries
> Example request:

```bash
curl -X GET -G "http://localhost/user/deliveries" 
```
```javascript
const url = new URL("http://localhost/user/deliveries");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/deliveries`


<!-- END_0a204c2983a84810b8559b370fd7a4ac -->

<!-- START_ed0a017909f181e1ffa2ad06aca8f1d4 -->
## user/takeaways
> Example request:

```bash
curl -X GET -G "http://localhost/user/takeaways" 
```
```javascript
const url = new URL("http://localhost/user/takeaways");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/takeaways`


<!-- END_ed0a017909f181e1ffa2ad06aca8f1d4 -->

<!-- START_a43bcbbebeb9c76f34da3be134afeb8d -->
## user/reservations
> Example request:

```bash
curl -X GET -G "http://localhost/user/reservations" 
```
```javascript
const url = new URL("http://localhost/user/reservations");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/reservations`


<!-- END_a43bcbbebeb9c76f34da3be134afeb8d -->

<!-- START_10c700a1a5173f595c341e34abcd27fb -->
## user/profile
> Example request:

```bash
curl -X GET -G "http://localhost/user/profile" 
```
```javascript
const url = new URL("http://localhost/user/profile");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/profile`


<!-- END_10c700a1a5173f595c341e34abcd27fb -->

<!-- START_1ed75808838e31f2416b868702c382be -->
## user/profile/post
> Example request:

```bash
curl -X POST "http://localhost/user/profile/post" 
```
```javascript
const url = new URL("http://localhost/user/profile/post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user/profile/post`


<!-- END_1ed75808838e31f2416b868702c382be -->

<!-- START_d4e973b132a41231f32233028b6b7257 -->
## user/password
> Example request:

```bash
curl -X GET -G "http://localhost/user/password" 
```
```javascript
const url = new URL("http://localhost/user/password");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/password`


<!-- END_d4e973b132a41231f32233028b6b7257 -->

<!-- START_fc954d215bb8a15e87fdd3f4a75fc645 -->
## user/password/post
> Example request:

```bash
curl -X POST "http://localhost/user/password/post" 
```
```javascript
const url = new URL("http://localhost/user/password/post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user/password/post`


<!-- END_fc954d215bb8a15e87fdd3f4a75fc645 -->

<!-- START_2c18df3a837cf8e3defd1032beaf8e7c -->
## user/address
> Example request:

```bash
curl -X GET -G "http://localhost/user/address" 
```
```javascript
const url = new URL("http://localhost/user/address");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/address`


<!-- END_2c18df3a837cf8e3defd1032beaf8e7c -->

<!-- START_e0bcfa4b72915fe43b1aeb37e597907f -->
## user/dining
> Example request:

```bash
curl -X GET -G "http://localhost/user/dining" 
```
```javascript
const url = new URL("http://localhost/user/dining");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/dining`


<!-- END_e0bcfa4b72915fe43b1aeb37e597907f -->

<!-- START_9159264f1f37168fc18df0ec1c318c57 -->
## user/dining/post
> Example request:

```bash
curl -X POST "http://localhost/user/dining/post" 
```
```javascript
const url = new URL("http://localhost/user/dining/post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user/dining/post`


<!-- END_9159264f1f37168fc18df0ec1c318c57 -->

<!-- START_0a7d3b483cf48a046c9b66d91109deb1 -->
## user/communication
> Example request:

```bash
curl -X GET -G "http://localhost/user/communication" 
```
```javascript
const url = new URL("http://localhost/user/communication");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/communication`


<!-- END_0a7d3b483cf48a046c9b66d91109deb1 -->

<!-- START_88c48ce113681ecb20da2a66b32c7d34 -->
## user/communication/post
> Example request:

```bash
curl -X POST "http://localhost/user/communication/post" 
```
```javascript
const url = new URL("http://localhost/user/communication/post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user/communication/post`


<!-- END_88c48ce113681ecb20da2a66b32c7d34 -->

<!-- START_c57cdf224f2ead8997b91cc456e0cf5a -->
## user/payment
> Example request:

```bash
curl -X GET -G "http://localhost/user/payment" 
```
```javascript
const url = new URL("http://localhost/user/payment");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/payment`


<!-- END_c57cdf224f2ead8997b91cc456e0cf5a -->

<!-- START_eed521dc1670767bc4680065e0c6c3cf -->
## user/payment/post
> Example request:

```bash
curl -X POST "http://localhost/user/payment/post" 
```
```javascript
const url = new URL("http://localhost/user/payment/post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user/payment/post`


<!-- END_eed521dc1670767bc4680065e0c6c3cf -->

<!-- START_3bcedda78ae45ef5c0f4c97a4963b7a1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/user" 
```
```javascript
const url = new URL("http://localhost/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user`


<!-- END_3bcedda78ae45ef5c0f4c97a4963b7a1 -->

<!-- START_06673e37f2aeae326bcc55d98b998d45 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/user/create" 
```
```javascript
const url = new URL("http://localhost/user/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/create`


<!-- END_06673e37f2aeae326bcc55d98b998d45 -->

<!-- START_3efbce72c5183a8fae61143a8bcdd44a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/user" 
```
```javascript
const url = new URL("http://localhost/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST user`


<!-- END_3efbce72c5183a8fae61143a8bcdd44a -->

<!-- START_7918d9f1ab4b0bdb25a75473dca51c27 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/user/1" 
```
```javascript
const url = new URL("http://localhost/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/{user}`


<!-- END_7918d9f1ab4b0bdb25a75473dca51c27 -->

<!-- START_472148c21a3de692528742c729750a1c -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/user/1/edit" 
```
```javascript
const url = new URL("http://localhost/user/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/{user}/edit`


<!-- END_472148c21a3de692528742c729750a1c -->

<!-- START_6a3ef17350fff97877239307bcd51786 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/user/1" 
```
```javascript
const url = new URL("http://localhost/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT user/{user}`

`PATCH user/{user}`


<!-- END_6a3ef17350fff97877239307bcd51786 -->

<!-- START_c3f689a804341d95e136d0131312e64f -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/user/1" 
```
```javascript
const url = new URL("http://localhost/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE user/{user}`


<!-- END_c3f689a804341d95e136d0131312e64f -->

<!-- START_f52efa17f71dcd07f01e503cb50a4231 -->
## delivery/confirm
> Example request:

```bash
curl -X GET -G "http://localhost/delivery/confirm" 
```
```javascript
const url = new URL("http://localhost/delivery/confirm");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET delivery/confirm`


<!-- END_f52efa17f71dcd07f01e503cb50a4231 -->

<!-- START_ac4199763321cad4059cac6b29d40249 -->
## delivery/validate
> Example request:

```bash
curl -X POST "http://localhost/delivery/validate" 
```
```javascript
const url = new URL("http://localhost/delivery/validate");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST delivery/validate`


<!-- END_ac4199763321cad4059cac6b29d40249 -->

<!-- START_ac11502ca2ef18b737c704810c1ec690 -->
## delivery
> Example request:

```bash
curl -X GET -G "http://localhost/delivery" 
```
```javascript
const url = new URL("http://localhost/delivery");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET delivery`


<!-- END_ac11502ca2ef18b737c704810c1ec690 -->

<!-- START_9f585f6839a8358571c50b04bfcbd9e1 -->
## delivery/create
> Example request:

```bash
curl -X GET -G "http://localhost/delivery/create" 
```
```javascript
const url = new URL("http://localhost/delivery/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET delivery/create`


<!-- END_9f585f6839a8358571c50b04bfcbd9e1 -->

<!-- START_cf2068ee230ad048602307ddfa8facbf -->
## delivery
> Example request:

```bash
curl -X POST "http://localhost/delivery" 
```
```javascript
const url = new URL("http://localhost/delivery");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST delivery`


<!-- END_cf2068ee230ad048602307ddfa8facbf -->

<!-- START_36d34f5b6e931e5c93ec15ffcfe4dc38 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/delivery/1" 
```
```javascript
const url = new URL("http://localhost/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET delivery/{delivery}`


<!-- END_36d34f5b6e931e5c93ec15ffcfe4dc38 -->

<!-- START_621beedcdcd746f448d0b675fd8ffbeb -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/delivery/1/edit" 
```
```javascript
const url = new URL("http://localhost/delivery/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET delivery/{delivery}/edit`


<!-- END_621beedcdcd746f448d0b675fd8ffbeb -->

<!-- START_caa6848aa5dc371b96fbcd7120cd3ace -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/delivery/1" 
```
```javascript
const url = new URL("http://localhost/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT delivery/{delivery}`

`PATCH delivery/{delivery}`


<!-- END_caa6848aa5dc371b96fbcd7120cd3ace -->

<!-- START_0d58e8a88c392f9953015e40f0a5c58d -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/delivery/1" 
```
```javascript
const url = new URL("http://localhost/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE delivery/{delivery}`


<!-- END_0d58e8a88c392f9953015e40f0a5c58d -->

<!-- START_412a0572306ce05195858b9514e13a57 -->
## takeaway/confirm
> Example request:

```bash
curl -X GET -G "http://localhost/takeaway/confirm" 
```
```javascript
const url = new URL("http://localhost/takeaway/confirm");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET takeaway/confirm`


<!-- END_412a0572306ce05195858b9514e13a57 -->

<!-- START_f220c5118f8f2b6544e110b374abd286 -->
## takeaway/validate
> Example request:

```bash
curl -X POST "http://localhost/takeaway/validate" 
```
```javascript
const url = new URL("http://localhost/takeaway/validate");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST takeaway/validate`


<!-- END_f220c5118f8f2b6544e110b374abd286 -->

<!-- START_2e2210316b696cc34f2e99510ff15458 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/takeaway" 
```
```javascript
const url = new URL("http://localhost/takeaway");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET takeaway`


<!-- END_2e2210316b696cc34f2e99510ff15458 -->

<!-- START_ba3767a61e0cd170dd57ccd9bc99bc02 -->
## takeaway/create
> Example request:

```bash
curl -X GET -G "http://localhost/takeaway/create" 
```
```javascript
const url = new URL("http://localhost/takeaway/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET takeaway/create`


<!-- END_ba3767a61e0cd170dd57ccd9bc99bc02 -->

<!-- START_dd2b3586f28edded4892015bdac59d20 -->
## takeaway
> Example request:

```bash
curl -X POST "http://localhost/takeaway" 
```
```javascript
const url = new URL("http://localhost/takeaway");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST takeaway`


<!-- END_dd2b3586f28edded4892015bdac59d20 -->

<!-- START_ce9301c18f1fe892a26288de87e99489 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET takeaway/{takeaway}`


<!-- END_ce9301c18f1fe892a26288de87e99489 -->

<!-- START_29d11f25a443c39796a41560573f4822 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/takeaway/1/edit" 
```
```javascript
const url = new URL("http://localhost/takeaway/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET takeaway/{takeaway}/edit`


<!-- END_29d11f25a443c39796a41560573f4822 -->

<!-- START_c58c29ead5a4d15a40379fa9ca02595b -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT takeaway/{takeaway}`

`PATCH takeaway/{takeaway}`


<!-- END_c58c29ead5a4d15a40379fa9ca02595b -->

<!-- START_d207a3e1569621e5bc5974f6f9cbebc4 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE takeaway/{takeaway}`


<!-- END_d207a3e1569621e5bc5974f6f9cbebc4 -->

<!-- START_abdb68db68f1e6e3cc1e5b3dec5bdbe0 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/reservation" 
```
```javascript
const url = new URL("http://localhost/reservation");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation`


<!-- END_abdb68db68f1e6e3cc1e5b3dec5bdbe0 -->

<!-- START_180614e7d7bf2d848f4cdb70c8f5eb05 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/reservation/create" 
```
```javascript
const url = new URL("http://localhost/reservation/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/create`


<!-- END_180614e7d7bf2d848f4cdb70c8f5eb05 -->

<!-- START_d14ceea9dd26f17d1600609c21f20b15 -->
## reservation
> Example request:

```bash
curl -X POST "http://localhost/reservation" 
```
```javascript
const url = new URL("http://localhost/reservation");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST reservation`


<!-- END_d14ceea9dd26f17d1600609c21f20b15 -->

<!-- START_5f87e67b6024147346cda8dfc6039ba9 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/reservation/1" 
```
```javascript
const url = new URL("http://localhost/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/{reservation}`


<!-- END_5f87e67b6024147346cda8dfc6039ba9 -->

<!-- START_e3cd4f73adf5698974ef09db50ded571 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/reservation/1/edit" 
```
```javascript
const url = new URL("http://localhost/reservation/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reservation/{reservation}/edit`


<!-- END_e3cd4f73adf5698974ef09db50ded571 -->

<!-- START_7d4def1e93c6d2a1cb23c31dacfd2af3 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/reservation/1" 
```
```javascript
const url = new URL("http://localhost/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT reservation/{reservation}`

`PATCH reservation/{reservation}`


<!-- END_7d4def1e93c6d2a1cb23c31dacfd2af3 -->

<!-- START_474d0c54a0478e1d88507b123afb4075 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/reservation/1" 
```
```javascript
const url = new URL("http://localhost/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE reservation/{reservation}`


<!-- END_474d0c54a0478e1d88507b123afb4075 -->

<!-- START_26b9084521de6d4cbd7c54c37ee7735a -->
## address/update-all
> Example request:

```bash
curl -X POST "http://localhost/address/update-all" 
```
```javascript
const url = new URL("http://localhost/address/update-all");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST address/update-all`


<!-- END_26b9084521de6d4cbd7c54c37ee7735a -->

<!-- START_439ce8249f1e209ca2ad64ce32d401b4 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/address" 
```
```javascript
const url = new URL("http://localhost/address");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET address`


<!-- END_439ce8249f1e209ca2ad64ce32d401b4 -->

<!-- START_b458fcb3c3c1cbe5fb71d57950dde49f -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/address/create" 
```
```javascript
const url = new URL("http://localhost/address/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET address/create`


<!-- END_b458fcb3c3c1cbe5fb71d57950dde49f -->

<!-- START_81282d1e79ebb6ce46ee332689e49990 -->
## address
> Example request:

```bash
curl -X POST "http://localhost/address" 
```
```javascript
const url = new URL("http://localhost/address");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST address`


<!-- END_81282d1e79ebb6ce46ee332689e49990 -->

<!-- START_dbcbbf206e2cdf815f4cc018be7f652f -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/address/1" 
```
```javascript
const url = new URL("http://localhost/address/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET address/{address}`


<!-- END_dbcbbf206e2cdf815f4cc018be7f652f -->

<!-- START_eb8dfb4f090b8d8db65ea404a70eb23e -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/address/1/edit" 
```
```javascript
const url = new URL("http://localhost/address/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET address/{address}/edit`


<!-- END_eb8dfb4f090b8d8db65ea404a70eb23e -->

<!-- START_1a5fde2720d6539b038a03fb7d40717a -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/address/1" 
```
```javascript
const url = new URL("http://localhost/address/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT address/{address}`

`PATCH address/{address}`


<!-- END_1a5fde2720d6539b038a03fb7d40717a -->

<!-- START_d1fd1569cb5b3a7c946de08dc30a854a -->
## address/{address}
> Example request:

```bash
curl -X DELETE "http://localhost/address/1" 
```
```javascript
const url = new URL("http://localhost/address/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE address/{address}`


<!-- END_d1fd1569cb5b3a7c946de08dc30a854a -->

<!-- START_e2e20fa462f67e5824f5b6c9b8fbf0a6 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/review" 
```
```javascript
const url = new URL("http://localhost/review");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST review`


<!-- END_e2e20fa462f67e5824f5b6c9b8fbf0a6 -->

<!-- START_0c20d67f1bd4a8d542bba7b5824fb274 -->
## ticket/user/message
> Example request:

```bash
curl -X POST "http://localhost/ticket/user/message" 
```
```javascript
const url = new URL("http://localhost/ticket/user/message");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST ticket/user/message`


<!-- END_0c20d67f1bd4a8d542bba7b5824fb274 -->

<!-- START_3036e2abaf41d36530700931242aa583 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/ticket" 
```
```javascript
const url = new URL("http://localhost/ticket");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET ticket`


<!-- END_3036e2abaf41d36530700931242aa583 -->

<!-- START_a550170322d8c9bd77afda0683db73d8 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/ticket/create" 
```
```javascript
const url = new URL("http://localhost/ticket/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET ticket/create`


<!-- END_a550170322d8c9bd77afda0683db73d8 -->

<!-- START_a66a188bc7c155f22bf71f278b6f4348 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/ticket" 
```
```javascript
const url = new URL("http://localhost/ticket");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST ticket`


<!-- END_a66a188bc7c155f22bf71f278b6f4348 -->

<!-- START_13f5856c7115fdab73c90384f2d20d8a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/ticket/1" 
```
```javascript
const url = new URL("http://localhost/ticket/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET ticket/{ticket}`


<!-- END_13f5856c7115fdab73c90384f2d20d8a -->

<!-- START_0bbe565eadbf13fd30ec85db0fa2ea04 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/ticket/1/edit" 
```
```javascript
const url = new URL("http://localhost/ticket/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET ticket/{ticket}/edit`


<!-- END_0bbe565eadbf13fd30ec85db0fa2ea04 -->

<!-- START_8dfeb2e73e425f99cd1bcf92d5255c96 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/ticket/1" 
```
```javascript
const url = new URL("http://localhost/ticket/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT ticket/{ticket}`

`PATCH ticket/{ticket}`


<!-- END_8dfeb2e73e425f99cd1bcf92d5255c96 -->

<!-- START_ecaf1fcd8944be5b13734554755dc6ce -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/ticket/1" 
```
```javascript
const url = new URL("http://localhost/ticket/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE ticket/{ticket}`


<!-- END_ecaf1fcd8944be5b13734554755dc6ce -->

<!-- START_64e04c9fb2968fed11b9d859ed45f35d -->
## promotion/validate
> Example request:

```bash
curl -X POST "http://localhost/promotion/validate" 
```
```javascript
const url = new URL("http://localhost/promotion/validate");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST promotion/validate`


<!-- END_64e04c9fb2968fed11b9d859ed45f35d -->

<!-- START_582f7eadc51fa094a5b51a8f45b6c574 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/promotion" 
```
```javascript
const url = new URL("http://localhost/promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET promotion`


<!-- END_582f7eadc51fa094a5b51a8f45b6c574 -->

<!-- START_bd3713e65ecdb7afec0b852176cdfb1b -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/promotion/create" 
```
```javascript
const url = new URL("http://localhost/promotion/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET promotion/create`


<!-- END_bd3713e65ecdb7afec0b852176cdfb1b -->

<!-- START_1ebcba66c8f97e74df6bba0cb228b310 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/promotion" 
```
```javascript
const url = new URL("http://localhost/promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST promotion`


<!-- END_1ebcba66c8f97e74df6bba0cb228b310 -->

<!-- START_536a1577773bffded64574a294e63aba -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/promotion/1" 
```
```javascript
const url = new URL("http://localhost/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET promotion/{promotion}`


<!-- END_536a1577773bffded64574a294e63aba -->

<!-- START_03106c4fb95a0669f99d4a3c35808bd1 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/promotion/1/edit" 
```
```javascript
const url = new URL("http://localhost/promotion/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET promotion/{promotion}/edit`


<!-- END_03106c4fb95a0669f99d4a3c35808bd1 -->

<!-- START_a90adc2db6f456a1340fa76ff3d71e40 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/promotion/1" 
```
```javascript
const url = new URL("http://localhost/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT promotion/{promotion}`

`PATCH promotion/{promotion}`


<!-- END_a90adc2db6f456a1340fa76ff3d71e40 -->

<!-- START_a8f940785b557a48c5f0cfcaf86ece3c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/promotion/1" 
```
```javascript
const url = new URL("http://localhost/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE promotion/{promotion}`


<!-- END_a8f940785b557a48c5f0cfcaf86ece3c -->

<!-- START_e1247e7035846d8aec94d3702b09dcc9 -->
## admin/delivery/get
> Example request:

```bash
curl -X POST "http://localhost/admin/delivery/get" 
```
```javascript
const url = new URL("http://localhost/admin/delivery/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/delivery/get`


<!-- END_e1247e7035846d8aec94d3702b09dcc9 -->

<!-- START_e64b5e0396cd08844db6f3d28e6cc515 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery" 
```
```javascript
const url = new URL("http://localhost/admin/delivery");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery`


<!-- END_e64b5e0396cd08844db6f3d28e6cc515 -->

<!-- START_4c3f51a11bfdf5ebd3c9e6c862c46e6b -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery/create" 
```
```javascript
const url = new URL("http://localhost/admin/delivery/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery/create`


<!-- END_4c3f51a11bfdf5ebd3c9e6c862c46e6b -->

<!-- START_263036ed35406e318038d27d096eb795 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/delivery" 
```
```javascript
const url = new URL("http://localhost/admin/delivery");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/delivery`


<!-- END_263036ed35406e318038d27d096eb795 -->

<!-- START_f2aaf638f3c728dd8b4d1467b5dd52d9 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery/1" 
```
```javascript
const url = new URL("http://localhost/admin/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery/{delivery}`


<!-- END_f2aaf638f3c728dd8b4d1467b5dd52d9 -->

<!-- START_f59bda430063a762dddc9173462d723a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/delivery/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery/{delivery}/edit`


<!-- END_f59bda430063a762dddc9173462d723a -->

<!-- START_7f0134d480858ace21ae518df1aec4a5 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/delivery/1" 
```
```javascript
const url = new URL("http://localhost/admin/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/delivery/{delivery}`

`PATCH admin/delivery/{delivery}`


<!-- END_7f0134d480858ace21ae518df1aec4a5 -->

<!-- START_7c8ce9f53c43f7d892d2a65633d634e8 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/delivery/1" 
```
```javascript
const url = new URL("http://localhost/admin/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/delivery/{delivery}`


<!-- END_7c8ce9f53c43f7d892d2a65633d634e8 -->

<!-- START_7e50f5fcadcbc0ffeb208eb847cccaab -->
## admin/takeaway/get
> Example request:

```bash
curl -X POST "http://localhost/admin/takeaway/get" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/takeaway/get`


<!-- END_7e50f5fcadcbc0ffeb208eb847cccaab -->

<!-- START_f6151120b6d4347951ade9589c84906c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway`


<!-- END_f6151120b6d4347951ade9589c84906c -->

<!-- START_fc99eeb6bba48cb396f174df3f478ec2 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway/create" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway/create`


<!-- END_fc99eeb6bba48cb396f174df3f478ec2 -->

<!-- START_2e50049dd4f525e6a1cf6c2de2cc47ef -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/takeaway" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/takeaway`


<!-- END_2e50049dd4f525e6a1cf6c2de2cc47ef -->

<!-- START_99010afb4a67cae66d00abf9b5055f13 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway/{takeaway}`


<!-- END_99010afb4a67cae66d00abf9b5055f13 -->

<!-- START_2726e6ad261ba04467dda7bcd8a960fd -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway/{takeaway}/edit`


<!-- END_2726e6ad261ba04467dda7bcd8a960fd -->

<!-- START_363595da333f342630c05eb1ff1358ee -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/takeaway/{takeaway}`

`PATCH admin/takeaway/{takeaway}`


<!-- END_363595da333f342630c05eb1ff1358ee -->

<!-- START_9d1f03462610cd8bb10aa37b22db29aa -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/takeaway/{takeaway}`


<!-- END_9d1f03462610cd8bb10aa37b22db29aa -->

<!-- START_a555abf48dbbbf877d4af6901f211137 -->
## admin/reservation/get
> Example request:

```bash
curl -X POST "http://localhost/admin/reservation/get" 
```
```javascript
const url = new URL("http://localhost/admin/reservation/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/reservation/get`


<!-- END_a555abf48dbbbf877d4af6901f211137 -->

<!-- START_ad7edac1314ed8f683a2cf55d30761db -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/reservation" 
```
```javascript
const url = new URL("http://localhost/admin/reservation");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reservation`


<!-- END_ad7edac1314ed8f683a2cf55d30761db -->

<!-- START_2f665d2dda1345592a4e069ae4a9d9cd -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/reservation/create" 
```
```javascript
const url = new URL("http://localhost/admin/reservation/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reservation/create`


<!-- END_2f665d2dda1345592a4e069ae4a9d9cd -->

<!-- START_3c529f3d602479fd098779ef1c93c687 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/reservation" 
```
```javascript
const url = new URL("http://localhost/admin/reservation");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/reservation`


<!-- END_3c529f3d602479fd098779ef1c93c687 -->

<!-- START_79eabf60f075295ffffd09f2a025f9a5 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/reservation/1" 
```
```javascript
const url = new URL("http://localhost/admin/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reservation/{reservation}`


<!-- END_79eabf60f075295ffffd09f2a025f9a5 -->

<!-- START_5b2cd2bde5655637d8911571a2aab55a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/reservation/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/reservation/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reservation/{reservation}/edit`


<!-- END_5b2cd2bde5655637d8911571a2aab55a -->

<!-- START_af3f2eb1b52f97c68e6bb439106bec57 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/reservation/1" 
```
```javascript
const url = new URL("http://localhost/admin/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/reservation/{reservation}`

`PATCH admin/reservation/{reservation}`


<!-- END_af3f2eb1b52f97c68e6bb439106bec57 -->

<!-- START_3ccf791e10d1906c48943807190ad141 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/reservation/1" 
```
```javascript
const url = new URL("http://localhost/admin/reservation/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/reservation/{reservation}`


<!-- END_3ccf791e10d1906c48943807190ad141 -->

<!-- START_ba5c8fece8ac00590886fcce265623e4 -->
## admin/menu/get
> Example request:

```bash
curl -X POST "http://localhost/admin/menu/get" 
```
```javascript
const url = new URL("http://localhost/admin/menu/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/menu/get`


<!-- END_ba5c8fece8ac00590886fcce265623e4 -->

<!-- START_5b6c1895b71fbcb112c3fa4fc888bdd5 -->
## admin/menu/get/items
> Example request:

```bash
curl -X POST "http://localhost/admin/menu/get/items" 
```
```javascript
const url = new URL("http://localhost/admin/menu/get/items");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/menu/get/items`


<!-- END_5b6c1895b71fbcb112c3fa4fc888bdd5 -->

<!-- START_fd0bc67d15193c7ddf967b4c39bf0da5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu" 
```
```javascript
const url = new URL("http://localhost/admin/menu");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu`


<!-- END_fd0bc67d15193c7ddf967b4c39bf0da5 -->

<!-- START_1b3ed2a74dd4e2548daffa829bab15c9 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu/create" 
```
```javascript
const url = new URL("http://localhost/admin/menu/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu/create`


<!-- END_1b3ed2a74dd4e2548daffa829bab15c9 -->

<!-- START_315a93a33be7202c1a72490ce060242a -->
## admin/menu
> Example request:

```bash
curl -X POST "http://localhost/admin/menu" 
```
```javascript
const url = new URL("http://localhost/admin/menu");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/menu`


<!-- END_315a93a33be7202c1a72490ce060242a -->

<!-- START_970e266e5ac6891bda0ea4b95b6cd71f -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu/1" 
```
```javascript
const url = new URL("http://localhost/admin/menu/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu/{menu}`


<!-- END_970e266e5ac6891bda0ea4b95b6cd71f -->

<!-- START_5dc2ec073197587f12f64c15df3c757a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/menu/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu/{menu}/edit`


<!-- END_5dc2ec073197587f12f64c15df3c757a -->

<!-- START_a686eb14ddfb606becebc4555132a3d8 -->
## admin/menu/{menu}
> Example request:

```bash
curl -X PUT "http://localhost/admin/menu/1" 
```
```javascript
const url = new URL("http://localhost/admin/menu/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/menu/{menu}`

`PATCH admin/menu/{menu}`


<!-- END_a686eb14ddfb606becebc4555132a3d8 -->

<!-- START_42cadd88793cb62596d8320d0d0fbd29 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/menu/1" 
```
```javascript
const url = new URL("http://localhost/admin/menu/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/menu/{menu}`


<!-- END_42cadd88793cb62596d8320d0d0fbd29 -->

<!-- START_6189102b1721c36e4e789408d20dd730 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu-item" 
```
```javascript
const url = new URL("http://localhost/admin/menu-item");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu-item`


<!-- END_6189102b1721c36e4e789408d20dd730 -->

<!-- START_bb1ecacebe471ede4bf6eca6d556624f -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu-item/create" 
```
```javascript
const url = new URL("http://localhost/admin/menu-item/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu-item/create`


<!-- END_bb1ecacebe471ede4bf6eca6d556624f -->

<!-- START_f1f37a0bddeb4304ed56f4c953ee3e9e -->
## admin/menu-item
> Example request:

```bash
curl -X POST "http://localhost/admin/menu-item" 
```
```javascript
const url = new URL("http://localhost/admin/menu-item");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/menu-item`


<!-- END_f1f37a0bddeb4304ed56f4c953ee3e9e -->

<!-- START_de6c4c3d256a25279edca5e6829ee275 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu-item/1" 
```
```javascript
const url = new URL("http://localhost/admin/menu-item/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu-item/{menu_item}`


<!-- END_de6c4c3d256a25279edca5e6829ee275 -->

<!-- START_3d3773533f9d2abc7b1df76a343cdce1 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/menu-item/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/menu-item/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/menu-item/{menu_item}/edit`


<!-- END_3d3773533f9d2abc7b1df76a343cdce1 -->

<!-- START_1182eaf604a0cec9dffc2f44a78f87dc -->
## admin/menu-item/{menu_item}
> Example request:

```bash
curl -X PUT "http://localhost/admin/menu-item/1" 
```
```javascript
const url = new URL("http://localhost/admin/menu-item/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/menu-item/{menu_item}`

`PATCH admin/menu-item/{menu_item}`


<!-- END_1182eaf604a0cec9dffc2f44a78f87dc -->

<!-- START_5450732057ac73b6b69fe5530b1a4fd1 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/menu-item/1" 
```
```javascript
const url = new URL("http://localhost/admin/menu-item/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/menu-item/{menu_item}`


<!-- END_5450732057ac73b6b69fe5530b1a4fd1 -->

<!-- START_e37922659bc8dd349d2d25a188a20d23 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/review" 
```
```javascript
const url = new URL("http://localhost/admin/review");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/review`


<!-- END_e37922659bc8dd349d2d25a188a20d23 -->

<!-- START_d76d8b44f1a51aea5c325c59f1fe8822 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/review/create" 
```
```javascript
const url = new URL("http://localhost/admin/review/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/review/create`


<!-- END_d76d8b44f1a51aea5c325c59f1fe8822 -->

<!-- START_1650d22fdf32e9a4041618f5c07356a0 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/review" 
```
```javascript
const url = new URL("http://localhost/admin/review");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/review`


<!-- END_1650d22fdf32e9a4041618f5c07356a0 -->

<!-- START_af3740b2337bbad8df6dc1461649f097 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/review/1" 
```
```javascript
const url = new URL("http://localhost/admin/review/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/review/{review}`


<!-- END_af3740b2337bbad8df6dc1461649f097 -->

<!-- START_1a301dc8fb846999b17f67f52ca6c23e -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/review/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/review/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/review/{review}/edit`


<!-- END_1a301dc8fb846999b17f67f52ca6c23e -->

<!-- START_4dcd161a4231f7bc4efb517e50a0e647 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/review/1" 
```
```javascript
const url = new URL("http://localhost/admin/review/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/review/{review}`

`PATCH admin/review/{review}`


<!-- END_4dcd161a4231f7bc4efb517e50a0e647 -->

<!-- START_5913fcb2cf7f58a985c3653cfbf4f682 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/review/1" 
```
```javascript
const url = new URL("http://localhost/admin/review/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/review/{review}`


<!-- END_5913fcb2cf7f58a985c3653cfbf4f682 -->

<!-- START_c3b839518293b79d566111d3d0724ccf -->
## admin/ticket/restaurant/message
> Example request:

```bash
curl -X POST "http://localhost/admin/ticket/restaurant/message" 
```
```javascript
const url = new URL("http://localhost/admin/ticket/restaurant/message");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/ticket/restaurant/message`


<!-- END_c3b839518293b79d566111d3d0724ccf -->

<!-- START_d3c6936c742bdfaf8fed04ed9941652e -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/ticket" 
```
```javascript
const url = new URL("http://localhost/admin/ticket");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/ticket`


<!-- END_d3c6936c742bdfaf8fed04ed9941652e -->

<!-- START_a16f913219cdec4e391998656b176841 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/ticket/create" 
```
```javascript
const url = new URL("http://localhost/admin/ticket/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/ticket/create`


<!-- END_a16f913219cdec4e391998656b176841 -->

<!-- START_0816978dd1023979986f6506c99edb55 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/ticket" 
```
```javascript
const url = new URL("http://localhost/admin/ticket");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/ticket`


<!-- END_0816978dd1023979986f6506c99edb55 -->

<!-- START_0c2da109361772580f52a1af41223235 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/ticket/1" 
```
```javascript
const url = new URL("http://localhost/admin/ticket/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/ticket/{ticket}`


<!-- END_0c2da109361772580f52a1af41223235 -->

<!-- START_11c007a9c72bf25625f3b2f05cc8fad5 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/ticket/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/ticket/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/ticket/{ticket}/edit`


<!-- END_11c007a9c72bf25625f3b2f05cc8fad5 -->

<!-- START_84efb3b5a6febb15d280fdaf87e72643 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/ticket/1" 
```
```javascript
const url = new URL("http://localhost/admin/ticket/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/ticket/{ticket}`

`PATCH admin/ticket/{ticket}`


<!-- END_84efb3b5a6febb15d280fdaf87e72643 -->

<!-- START_aa2f22353a78580ce44401b4519bc3c1 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/ticket/1" 
```
```javascript
const url = new URL("http://localhost/admin/ticket/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/ticket/{ticket}`


<!-- END_aa2f22353a78580ce44401b4519bc3c1 -->

<!-- START_6443052c263964790bdd6c1c655eeffb -->
## admin/restaurant/own
> Example request:

```bash
curl -X GET -G "http://localhost/admin/restaurant/own" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/own");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/restaurant/own`


<!-- END_6443052c263964790bdd6c1c655eeffb -->

<!-- START_cccdb95109d2df0df5c47fbb3796b793 -->
## admin/restaurant/online
> Example request:

```bash
curl -X POST "http://localhost/admin/restaurant/online" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/online");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/restaurant/online`


<!-- END_cccdb95109d2df0df5c47fbb3796b793 -->

<!-- START_5da473d5b119b1a65a9b58af8883683c -->
## admin/restaurant/online
> Example request:

```bash
curl -X GET -G "http://localhost/admin/restaurant/online" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/online");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/restaurant/online`


<!-- END_5da473d5b119b1a65a9b58af8883683c -->

<!-- START_6927b1935b991e89dcba60aa4d91623f -->
## admin/restaurant/slider/remove
> Example request:

```bash
curl -X POST "http://localhost/admin/restaurant/slider/remove" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/slider/remove");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/restaurant/slider/remove`


<!-- END_6927b1935b991e89dcba60aa4d91623f -->

<!-- START_43c2c003b851cc8a14304f419e1c4783 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/restaurant" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/restaurant`


<!-- END_43c2c003b851cc8a14304f419e1c4783 -->

<!-- START_eb7eedd6e1e9218f5384a8211f071203 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/restaurant/create" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/restaurant/create`


<!-- END_eb7eedd6e1e9218f5384a8211f071203 -->

<!-- START_373794c9e0936be4a4903e69d149f2b7 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/restaurant" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/restaurant`


<!-- END_373794c9e0936be4a4903e69d149f2b7 -->

<!-- START_3408fc3425ea7d315d07f61f384d8321 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/restaurant/{restaurant}`


<!-- END_3408fc3425ea7d315d07f61f384d8321 -->

<!-- START_f30b9a9ce5c767050dfb1b3f16afde13 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/restaurant/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/restaurant/{restaurant}/edit`


<!-- END_f30b9a9ce5c767050dfb1b3f16afde13 -->

<!-- START_69c673ecf05d72003cdb9c32f4adaa1b -->
## admin/restaurant/{restaurant}
> Example request:

```bash
curl -X PUT "http://localhost/admin/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/restaurant/{restaurant}`

`PATCH admin/restaurant/{restaurant}`


<!-- END_69c673ecf05d72003cdb9c32f4adaa1b -->

<!-- START_2a7d9f0bbef9b3a7a06d2e09a2a52008 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/admin/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/restaurant/{restaurant}`


<!-- END_2a7d9f0bbef9b3a7a06d2e09a2a52008 -->

<!-- START_6515cd4c95426e493b7bc1c7b3f9caa1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery-location" 
```
```javascript
const url = new URL("http://localhost/admin/delivery-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery-location`


<!-- END_6515cd4c95426e493b7bc1c7b3f9caa1 -->

<!-- START_f5100c849a610180dacc1580bcead7b0 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery-location/create" 
```
```javascript
const url = new URL("http://localhost/admin/delivery-location/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery-location/create`


<!-- END_f5100c849a610180dacc1580bcead7b0 -->

<!-- START_93bcca93d1a6b28bfc931cdc907c3242 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/delivery-location" 
```
```javascript
const url = new URL("http://localhost/admin/delivery-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/delivery-location`


<!-- END_93bcca93d1a6b28bfc931cdc907c3242 -->

<!-- START_29309fd5c977cfe3d1e793a06a6c82d9 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery-location/1" 
```
```javascript
const url = new URL("http://localhost/admin/delivery-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery-location/{delivery_location}`


<!-- END_29309fd5c977cfe3d1e793a06a6c82d9 -->

<!-- START_243dfe2e175971f383c16b4f4c164946 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/delivery-location/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/delivery-location/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/delivery-location/{delivery_location}/edit`


<!-- END_243dfe2e175971f383c16b4f4c164946 -->

<!-- START_641990342ce1f5b964a1f312625fc5f7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/delivery-location/1" 
```
```javascript
const url = new URL("http://localhost/admin/delivery-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/delivery-location/{delivery_location}`

`PATCH admin/delivery-location/{delivery_location}`


<!-- END_641990342ce1f5b964a1f312625fc5f7 -->

<!-- START_6f6a168db1db2199f15f65581c3889f5 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/delivery-location/1" 
```
```javascript
const url = new URL("http://localhost/admin/delivery-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/delivery-location/{delivery_location}`


<!-- END_6f6a168db1db2199f15f65581c3889f5 -->

<!-- START_3adb8b11e84dce89a54af8008442c45d -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway-location" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway-location`


<!-- END_3adb8b11e84dce89a54af8008442c45d -->

<!-- START_36448cf964d88f23b350a3d2eb3084bb -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway-location/create" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway-location/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway-location/create`


<!-- END_36448cf964d88f23b350a3d2eb3084bb -->

<!-- START_97ebe73830acd4c8ad94aac15958e907 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/takeaway-location" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/takeaway-location`


<!-- END_97ebe73830acd4c8ad94aac15958e907 -->

<!-- START_7f706ff2cbf83828329cf2588f873d93 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway-location/1" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway-location/{takeaway_location}`


<!-- END_7f706ff2cbf83828329cf2588f873d93 -->

<!-- START_c25de4a77126d7d484a0a20813bcce48 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/takeaway-location/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway-location/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/takeaway-location/{takeaway_location}/edit`


<!-- END_c25de4a77126d7d484a0a20813bcce48 -->

<!-- START_526b7dc17277fb9297dae97a6e87d1a6 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/takeaway-location/1" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/takeaway-location/{takeaway_location}`

`PATCH admin/takeaway-location/{takeaway_location}`


<!-- END_526b7dc17277fb9297dae97a6e87d1a6 -->

<!-- START_b9102d67d1f395d78619252f0a63aab2 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/takeaway-location/1" 
```
```javascript
const url = new URL("http://localhost/admin/takeaway-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/takeaway-location/{takeaway_location}`


<!-- END_b9102d67d1f395d78619252f0a63aab2 -->

<!-- START_721d855563b7580e93bbbb862e09f838 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/promotion" 
```
```javascript
const url = new URL("http://localhost/admin/promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/promotion`


<!-- END_721d855563b7580e93bbbb862e09f838 -->

<!-- START_1a0598db68058f7c8f8a329b77f176f7 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/promotion/create" 
```
```javascript
const url = new URL("http://localhost/admin/promotion/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/promotion/create`


<!-- END_1a0598db68058f7c8f8a329b77f176f7 -->

<!-- START_5b272907c258d6f65f74d318779c8345 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/admin/promotion" 
```
```javascript
const url = new URL("http://localhost/admin/promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST admin/promotion`


<!-- END_5b272907c258d6f65f74d318779c8345 -->

<!-- START_5e2dfe349643ff8f900b42b77df2f6a9 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/promotion/1" 
```
```javascript
const url = new URL("http://localhost/admin/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/promotion/{promotion}`


<!-- END_5e2dfe349643ff8f900b42b77df2f6a9 -->

<!-- START_951a30665b939b83e0b0f62ad1f71bb2 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/admin/promotion/1/edit" 
```
```javascript
const url = new URL("http://localhost/admin/promotion/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/promotion/{promotion}/edit`


<!-- END_951a30665b939b83e0b0f62ad1f71bb2 -->

<!-- START_fd363c9840e6e76b0bcfb96b3f93f6e9 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/admin/promotion/1" 
```
```javascript
const url = new URL("http://localhost/admin/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT admin/promotion/{promotion}`

`PATCH admin/promotion/{promotion}`


<!-- END_fd363c9840e6e76b0bcfb96b3f93f6e9 -->

<!-- START_d2870048398cef58a030ec50172f7715 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/admin/promotion/1" 
```
```javascript
const url = new URL("http://localhost/admin/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE admin/promotion/{promotion}`


<!-- END_d2870048398cef58a030ec50172f7715 -->

<!-- START_dc82dd42cfffa8c62aec8026c80ac1d9 -->
## admin/report/data/bar
> Example request:

```bash
curl -X GET -G "http://localhost/admin/report/data/bar" 
```
```javascript
const url = new URL("http://localhost/admin/report/data/bar");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/report/data/bar`


<!-- END_dc82dd42cfffa8c62aec8026c80ac1d9 -->

<!-- START_63119e727514e23df4c236fc44b8e5f7 -->
## admin/report/data
> Example request:

```bash
curl -X GET -G "http://localhost/admin/report/data" 
```
```javascript
const url = new URL("http://localhost/admin/report/data");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/report/data`


<!-- END_63119e727514e23df4c236fc44b8e5f7 -->

<!-- START_5c107a7e34e7ce9b6241a66ed09bed1c -->
## admin/report
> Example request:

```bash
curl -X GET -G "http://localhost/admin/report" 
```
```javascript
const url = new URL("http://localhost/admin/report");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/report`


<!-- END_5c107a7e34e7ce9b6241a66ed09bed1c -->

<!-- START_54564073571678f8ad09e73153b20458 -->
## master-admin/restaurant/request
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/restaurant/request" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/request");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/restaurant/request`


<!-- END_54564073571678f8ad09e73153b20458 -->

<!-- START_9fd33340cb47b3619ac31cd8f85fb374 -->
## master-admin/restaurant/get-request
> Example request:

```bash
curl -X POST "http://localhost/master-admin/restaurant/get-request" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/get-request");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/restaurant/get-request`


<!-- END_9fd33340cb47b3619ac31cd8f85fb374 -->

<!-- START_d8a6d45bc60cdf147d68c10fb06e9be5 -->
## master-admin/restaurant/get
> Example request:

```bash
curl -X POST "http://localhost/master-admin/restaurant/get" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/restaurant/get`


<!-- END_d8a6d45bc60cdf147d68c10fb06e9be5 -->

<!-- START_5fd3dc0c49b895c852ef3edd592af5f8 -->
## master-admin/restaurant/deactive
> Example request:

```bash
curl -X POST "http://localhost/master-admin/restaurant/deactive" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/deactive");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/restaurant/deactive`


<!-- END_5fd3dc0c49b895c852ef3edd592af5f8 -->

<!-- START_ef44b5fdb8a579b732081c4d7231e52a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/restaurant" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/restaurant`


<!-- END_ef44b5fdb8a579b732081c4d7231e52a -->

<!-- START_29b606e23d82f76584cc8026b4cdc91e -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/restaurant/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/restaurant/create`


<!-- END_29b606e23d82f76584cc8026b4cdc91e -->

<!-- START_8f9eece9e508573500a11752a166df58 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/restaurant" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/restaurant`


<!-- END_8f9eece9e508573500a11752a166df58 -->

<!-- START_47e5d14d36a5efb014fbcd9e2a8dec80 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/restaurant/{restaurant}`


<!-- END_47e5d14d36a5efb014fbcd9e2a8dec80 -->

<!-- START_bbf4b2b65308365af8a5b92b5df5cfdf -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/restaurant/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/restaurant/{restaurant}/edit`


<!-- END_bbf4b2b65308365af8a5b92b5df5cfdf -->

<!-- START_3d528274a70f0484b932f576f9b1c199 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/restaurant/{restaurant}`

`PATCH master-admin/restaurant/{restaurant}`


<!-- END_3d528274a70f0484b932f576f9b1c199 -->

<!-- START_651a375e9351e33c5f0de6a202743965 -->
## master-admin/restaurant/{restaurant}
> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/restaurant/{restaurant}`


<!-- END_651a375e9351e33c5f0de6a202743965 -->

<!-- START_33e053d5556789697423331677c42b99 -->
## master-admin/menu/get
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu/get" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu/get`


<!-- END_33e053d5556789697423331677c42b99 -->

<!-- START_d8ee657d38de982fba83d741b8a00b92 -->
## master-admin/menu/get/items
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu/get/items" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu/get/items");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu/get/items`


<!-- END_d8ee657d38de982fba83d741b8a00b92 -->

<!-- START_f95825434d8233fbba9e506f7b2a3774 -->
## master-admin/menu
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu`


<!-- END_f95825434d8233fbba9e506f7b2a3774 -->

<!-- START_fa4a1e950ad9da344ba14bad26a30d13 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu/create`


<!-- END_fa4a1e950ad9da344ba14bad26a30d13 -->

<!-- START_1bf48b7ec1a71db808d2130c2ed1523b -->
## master-admin/menu
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu`


<!-- END_1bf48b7ec1a71db808d2130c2ed1523b -->

<!-- START_7a2c49c466d700d8aad07b2ecc9b1827 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu/{menu}`


<!-- END_7a2c49c466d700d8aad07b2ecc9b1827 -->

<!-- START_e4f665f1a79584168142378119463552 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu/{menu}/edit`


<!-- END_e4f665f1a79584168142378119463552 -->

<!-- START_6f7adcc0b516c2a3297ee4372ef6d436 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/menu/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/menu/{menu}`

`PATCH master-admin/menu/{menu}`


<!-- END_6f7adcc0b516c2a3297ee4372ef6d436 -->

<!-- START_a8bb139261b30b8e346cae17768e441e -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/menu/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/menu/{menu}`


<!-- END_a8bb139261b30b8e346cae17768e441e -->

<!-- START_e784f33cf293e14828c6e794333e2725 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item`


<!-- END_e784f33cf293e14828c6e794333e2725 -->

<!-- START_2522a3aaf145443687bbe20383bd1c7b -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item/create`


<!-- END_2522a3aaf145443687bbe20383bd1c7b -->

<!-- START_9dcdf715c1b73f1cdc8c45c8cb19a9f5 -->
## master-admin/menu-item
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu-item" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu-item`


<!-- END_9dcdf715c1b73f1cdc8c45c8cb19a9f5 -->

<!-- START_f57b0c670ef5179719d1ca2de00734e9 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item/{menu_item}`


<!-- END_f57b0c670ef5179719d1ca2de00734e9 -->

<!-- START_bb25eec244bc9798ec77dd7dfbcbd478 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item/{menu_item}/edit`


<!-- END_bb25eec244bc9798ec77dd7dfbcbd478 -->

<!-- START_13174ed4a308bc3b7d96bcbc20ab749f -->
## master-admin/menu-item/{menu_item}
> Example request:

```bash
curl -X PUT "http://localhost/master-admin/menu-item/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/menu-item/{menu_item}`

`PATCH master-admin/menu-item/{menu_item}`


<!-- END_13174ed4a308bc3b7d96bcbc20ab749f -->

<!-- START_e8c301c9c409a93805592019b3ac74bf -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/menu-item/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/menu-item/{menu_item}`


<!-- END_e8c301c9c409a93805592019b3ac74bf -->

<!-- START_aa1dd9b5d71ff2970bf26e8ef04cc5ca -->
## master-admin/menu-clone/approve
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu-clone/approve" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone/approve");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu-clone/approve`


<!-- END_aa1dd9b5d71ff2970bf26e8ef04cc5ca -->

<!-- START_ca3da6dd1bbd945bf2bd0df71f5ed6fb -->
## master-admin/menu-clone/get/items
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu-clone/get/items" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone/get/items");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu-clone/get/items`


<!-- END_ca3da6dd1bbd945bf2bd0df71f5ed6fb -->

<!-- START_0ba2de58f319e4431a8dcf9860713c93 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-clone" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-clone`


<!-- END_0ba2de58f319e4431a8dcf9860713c93 -->

<!-- START_24330ea58cf9a044cc701eea7dff6731 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-clone/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-clone/create`


<!-- END_24330ea58cf9a044cc701eea7dff6731 -->

<!-- START_06cbabb591bd971130127a126781ab2f -->
## master-admin/menu-clone
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu-clone" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu-clone`


<!-- END_06cbabb591bd971130127a126781ab2f -->

<!-- START_a673c8c0bd5a8573e9c1488e6f0a5681 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-clone/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-clone/{menu_clone}`


<!-- END_a673c8c0bd5a8573e9c1488e6f0a5681 -->

<!-- START_7ac56c7159ca887f648aa5ecd98e872c -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-clone/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-clone/{menu_clone}/edit`


<!-- END_7ac56c7159ca887f648aa5ecd98e872c -->

<!-- START_93c93df0449928f602715cf285d0fdf4 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/menu-clone/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/menu-clone/{menu_clone}`

`PATCH master-admin/menu-clone/{menu_clone}`


<!-- END_93c93df0449928f602715cf285d0fdf4 -->

<!-- START_40a07fd64e4af92283f77a3224a5bb89 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/menu-clone/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-clone/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/menu-clone/{menu_clone}`


<!-- END_40a07fd64e4af92283f77a3224a5bb89 -->

<!-- START_d9b8ea5949039d2d1ba0b8912e70dfd2 -->
## master-admin/menu-item-clone/approve
> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu-item-clone/approve" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone/approve");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu-item-clone/approve`


<!-- END_d9b8ea5949039d2d1ba0b8912e70dfd2 -->

<!-- START_c4a194487481b47d7145a3db33a6b234 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item-clone" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item-clone`


<!-- END_c4a194487481b47d7145a3db33a6b234 -->

<!-- START_24e1283620cbe9a0fbdef7aa154076ef -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item-clone/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item-clone/create`


<!-- END_24e1283620cbe9a0fbdef7aa154076ef -->

<!-- START_412e7b22e3b73443acb80f640440492b -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/menu-item-clone" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/menu-item-clone`


<!-- END_412e7b22e3b73443acb80f640440492b -->

<!-- START_77d8ea6c93ca80fd45acbb501d22b31e -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item-clone/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item-clone/{menu_item_clone}`


<!-- END_77d8ea6c93ca80fd45acbb501d22b31e -->

<!-- START_f0027465378e80c0e54d32737a3126fe -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/menu-item-clone/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/menu-item-clone/{menu_item_clone}/edit`


<!-- END_f0027465378e80c0e54d32737a3126fe -->

<!-- START_c588aae768d3f82ab2eb74caa4b20ebb -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/menu-item-clone/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/menu-item-clone/{menu_item_clone}`

`PATCH master-admin/menu-item-clone/{menu_item_clone}`


<!-- END_c588aae768d3f82ab2eb74caa4b20ebb -->

<!-- START_098d84711243f9d02f4831fa5d94e2bb -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/menu-item-clone/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/menu-item-clone/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/menu-item-clone/{menu_item_clone}`


<!-- END_098d84711243f9d02f4831fa5d94e2bb -->

<!-- START_2d26fb6b965405b24047d7bef476b74f -->
## master-admin/delivery-location
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/delivery-location" 
```
```javascript
const url = new URL("http://localhost/master-admin/delivery-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/delivery-location`


<!-- END_2d26fb6b965405b24047d7bef476b74f -->

<!-- START_4c7e7a53df27a0c8c41a967fe597f80e -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/delivery-location/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/delivery-location/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/delivery-location/create`


<!-- END_4c7e7a53df27a0c8c41a967fe597f80e -->

<!-- START_c0ddae1ee5a2e94b65e2e228d47fb27c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/delivery-location" 
```
```javascript
const url = new URL("http://localhost/master-admin/delivery-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/delivery-location`


<!-- END_c0ddae1ee5a2e94b65e2e228d47fb27c -->

<!-- START_c54d63f72bfaf1a41f3d091b9e33deff -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/delivery-location/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/delivery-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/delivery-location/{delivery_location}`


<!-- END_c54d63f72bfaf1a41f3d091b9e33deff -->

<!-- START_54365a78eca91e96ae798ab58b43ffa8 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/delivery-location/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/delivery-location/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/delivery-location/{delivery_location}/edit`


<!-- END_54365a78eca91e96ae798ab58b43ffa8 -->

<!-- START_5376eab853a9ef1c95fc05afabd3b206 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/delivery-location/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/delivery-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/delivery-location/{delivery_location}`

`PATCH master-admin/delivery-location/{delivery_location}`


<!-- END_5376eab853a9ef1c95fc05afabd3b206 -->

<!-- START_7a67a5c261ad3b7fce8913fc34227991 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/delivery-location/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/delivery-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/delivery-location/{delivery_location}`


<!-- END_7a67a5c261ad3b7fce8913fc34227991 -->

<!-- START_235c991b37e7be114ef4d24a6a037db4 -->
## master-admin/takeaway-location
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/takeaway-location" 
```
```javascript
const url = new URL("http://localhost/master-admin/takeaway-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/takeaway-location`


<!-- END_235c991b37e7be114ef4d24a6a037db4 -->

<!-- START_58c1b5e1c6288f74cda48bffe422c657 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/takeaway-location/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/takeaway-location/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/takeaway-location/create`


<!-- END_58c1b5e1c6288f74cda48bffe422c657 -->

<!-- START_728b14e41495b9723e86c582341b5e04 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/takeaway-location" 
```
```javascript
const url = new URL("http://localhost/master-admin/takeaway-location");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/takeaway-location`


<!-- END_728b14e41495b9723e86c582341b5e04 -->

<!-- START_e49349222c0d821ee5c36fdc5e3c5cd6 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/takeaway-location/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/takeaway-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/takeaway-location/{takeaway_location}`


<!-- END_e49349222c0d821ee5c36fdc5e3c5cd6 -->

<!-- START_fb939eb53a702ec21b1a88ddcc7eea63 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/takeaway-location/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/takeaway-location/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/takeaway-location/{takeaway_location}/edit`


<!-- END_fb939eb53a702ec21b1a88ddcc7eea63 -->

<!-- START_fa73c187cf9be5209cf6e15dab452ada -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/takeaway-location/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/takeaway-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/takeaway-location/{takeaway_location}`

`PATCH master-admin/takeaway-location/{takeaway_location}`


<!-- END_fa73c187cf9be5209cf6e15dab452ada -->

<!-- START_e19b6258d258072031c2b08babc9bc77 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/takeaway-location/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/takeaway-location/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/takeaway-location/{takeaway_location}`


<!-- END_e19b6258d258072031c2b08babc9bc77 -->

<!-- START_29eb84f1bd43830d08b982470affbdc2 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/promotion" 
```
```javascript
const url = new URL("http://localhost/master-admin/promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/promotion`


<!-- END_29eb84f1bd43830d08b982470affbdc2 -->

<!-- START_2b860bd5480d8038d48afbeeb2a5e637 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/promotion/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/promotion/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/promotion/create`


<!-- END_2b860bd5480d8038d48afbeeb2a5e637 -->

<!-- START_6ace065df6182a07b9e5b82d00aca6b7 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/promotion" 
```
```javascript
const url = new URL("http://localhost/master-admin/promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/promotion`


<!-- END_6ace065df6182a07b9e5b82d00aca6b7 -->

<!-- START_d2dce828f7c38f9fe9250728a93e5394 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/promotion/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/promotion/{promotion}`


<!-- END_d2dce828f7c38f9fe9250728a93e5394 -->

<!-- START_c3507fc478e6e249a886f03c19ea9e33 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/promotion/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/promotion/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/promotion/{promotion}/edit`


<!-- END_c3507fc478e6e249a886f03c19ea9e33 -->

<!-- START_203c11fdafcc9e835173fb23651f5d81 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/promotion/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/promotion/{promotion}`

`PATCH master-admin/promotion/{promotion}`


<!-- END_203c11fdafcc9e835173fb23651f5d81 -->

<!-- START_49b484e7621d5679b375178bf21a898d -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/promotion/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/promotion/{promotion}`


<!-- END_49b484e7621d5679b375178bf21a898d -->

<!-- START_47dd0d2b5ace760453f8caf4196d0d31 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/cuisine" 
```
```javascript
const url = new URL("http://localhost/master-admin/cuisine");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/cuisine`


<!-- END_47dd0d2b5ace760453f8caf4196d0d31 -->

<!-- START_8d6c0f18522669323f3b75ff773c5973 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/cuisine/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/cuisine/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/cuisine/create`


<!-- END_8d6c0f18522669323f3b75ff773c5973 -->

<!-- START_c4f0c1903b7a56302ba6514ee1319271 -->
## master-admin/cuisine
> Example request:

```bash
curl -X POST "http://localhost/master-admin/cuisine" 
```
```javascript
const url = new URL("http://localhost/master-admin/cuisine");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/cuisine`


<!-- END_c4f0c1903b7a56302ba6514ee1319271 -->

<!-- START_31970b21cc78b0a039d743faaf1e94b0 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/cuisine/{cuisine}`


<!-- END_31970b21cc78b0a039d743faaf1e94b0 -->

<!-- START_ce324fc39edecb2ce10666d119a6aa49 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/cuisine/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/cuisine/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/cuisine/{cuisine}/edit`


<!-- END_ce324fc39edecb2ce10666d119a6aa49 -->

<!-- START_f201dcc54feed702c51b069ce8943f91 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/cuisine/{cuisine}`

`PATCH master-admin/cuisine/{cuisine}`


<!-- END_f201dcc54feed702c51b069ce8943f91 -->

<!-- START_e793f9e867bdd2ed3cc9434b7d2a2ba7 -->
## master-admin/cuisine/{cuisine}
> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/cuisine/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/cuisine/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/cuisine/{cuisine}`


<!-- END_e793f9e867bdd2ed3cc9434b7d2a2ba7 -->

<!-- START_22d5fd8a40c1ee6dda0fed57324635dc -->
## master-admin/user/get
> Example request:

```bash
curl -X POST "http://localhost/master-admin/user/get" 
```
```javascript
const url = new URL("http://localhost/master-admin/user/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/user/get`


<!-- END_22d5fd8a40c1ee6dda0fed57324635dc -->

<!-- START_5d5e4c598ac0705cd9f730fd1b62cd4a -->
## master-admin/user/restore
> Example request:

```bash
curl -X POST "http://localhost/master-admin/user/restore" 
```
```javascript
const url = new URL("http://localhost/master-admin/user/restore");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/user/restore`


<!-- END_5d5e4c598ac0705cd9f730fd1b62cd4a -->

<!-- START_6bb2cf1d2c952779877984fbd669bbf8 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/user" 
```
```javascript
const url = new URL("http://localhost/master-admin/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/user`


<!-- END_6bb2cf1d2c952779877984fbd669bbf8 -->

<!-- START_bcfbb68e7f8f7ce5ca894156a7d0519e -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/user/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/user/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/user/create`


<!-- END_bcfbb68e7f8f7ce5ca894156a7d0519e -->

<!-- START_717199510400dd93a8da84b7779a8499 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/user" 
```
```javascript
const url = new URL("http://localhost/master-admin/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/user`


<!-- END_717199510400dd93a8da84b7779a8499 -->

<!-- START_793333b3a5e6cd0f3ef228c92a71730e -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/user/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/user/{user}`


<!-- END_793333b3a5e6cd0f3ef228c92a71730e -->

<!-- START_458f980d697de57bdf76661a0c6b5acc -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/user/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/user/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/user/{user}/edit`


<!-- END_458f980d697de57bdf76661a0c6b5acc -->

<!-- START_dbba7ce669e34efa7b770cdc1935d932 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/user/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/user/{user}`

`PATCH master-admin/user/{user}`


<!-- END_dbba7ce669e34efa7b770cdc1935d932 -->

<!-- START_61d0095d4f28f8c7f34080e1d1bb8897 -->
## master-admin/user/{user}
> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/user/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/user/{user}`


<!-- END_61d0095d4f28f8c7f34080e1d1bb8897 -->

<!-- START_664df9115132b4417612a346519aa15e -->
## master-admin/subscription/get
> Example request:

```bash
curl -X POST "http://localhost/master-admin/subscription/get" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/subscription/get`


<!-- END_664df9115132b4417612a346519aa15e -->

<!-- START_e3fc9a6bd17a36093b6f7f55c69daedf -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/subscription" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/subscription`


<!-- END_e3fc9a6bd17a36093b6f7f55c69daedf -->

<!-- START_1b31081ef557f96834dc391509d5528a -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/subscription/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/subscription/create`


<!-- END_1b31081ef557f96834dc391509d5528a -->

<!-- START_682d012ac1a42b9fd5c43bd133e6cfc8 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/subscription" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/subscription`


<!-- END_682d012ac1a42b9fd5c43bd133e6cfc8 -->

<!-- START_33b1228f40fbd181ce9c6982557d8e0c -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/subscription/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/subscription/{subscription}`


<!-- END_33b1228f40fbd181ce9c6982557d8e0c -->

<!-- START_a9427976a8a2ce6f9df047c3e1e3a952 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/subscription/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/subscription/{subscription}/edit`


<!-- END_a9427976a8a2ce6f9df047c3e1e3a952 -->

<!-- START_fa6a4eb5b0353621d7051644a5126406 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/subscription/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/subscription/{subscription}`

`PATCH master-admin/subscription/{subscription}`


<!-- END_fa6a4eb5b0353621d7051644a5126406 -->

<!-- START_a509def9f1b6b8f9ffae5aa8c47736d2 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/subscription/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/subscription/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/subscription/{subscription}`


<!-- END_a509def9f1b6b8f9ffae5aa8c47736d2 -->

<!-- START_bd1f110959e9e4f60250fb4db4f0dbbf -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/site-promotion" 
```
```javascript
const url = new URL("http://localhost/master-admin/site-promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/site-promotion`


<!-- END_bd1f110959e9e4f60250fb4db4f0dbbf -->

<!-- START_c6bbba0b96755b50535702f70e3008a4 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/site-promotion/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/site-promotion/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/site-promotion/create`


<!-- END_c6bbba0b96755b50535702f70e3008a4 -->

<!-- START_1565c3773a0378447178102bd337d298 -->
## master-admin/site-promotion
> Example request:

```bash
curl -X POST "http://localhost/master-admin/site-promotion" 
```
```javascript
const url = new URL("http://localhost/master-admin/site-promotion");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/site-promotion`


<!-- END_1565c3773a0378447178102bd337d298 -->

<!-- START_5e6fa8d9cd839c18ab8ebe980a512f9e -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/site-promotion/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/site-promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/site-promotion/{site_promotion}`


<!-- END_5e6fa8d9cd839c18ab8ebe980a512f9e -->

<!-- START_48bc4823f4ada3aa480eb7516af473f3 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/site-promotion/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/site-promotion/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/site-promotion/{site_promotion}/edit`


<!-- END_48bc4823f4ada3aa480eb7516af473f3 -->

<!-- START_41434d08c8ee806451ab5f124511890e -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/site-promotion/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/site-promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/site-promotion/{site_promotion}`

`PATCH master-admin/site-promotion/{site_promotion}`


<!-- END_41434d08c8ee806451ab5f124511890e -->

<!-- START_53a3b39cc09fee8c63bf24162c5c031d -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/site-promotion/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/site-promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/site-promotion/{site_promotion}`


<!-- END_53a3b39cc09fee8c63bf24162c5c031d -->

<!-- START_2a62438fdcb43d33af98fed622b8e8dc -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/setting" 
```
```javascript
const url = new URL("http://localhost/master-admin/setting");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/setting`


<!-- END_2a62438fdcb43d33af98fed622b8e8dc -->

<!-- START_447cb3810a57a51dc803c032fe88ebb6 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/setting/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/setting/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/setting/create`


<!-- END_447cb3810a57a51dc803c032fe88ebb6 -->

<!-- START_2501ae328ece545fc1b44e1c0498c44c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/setting" 
```
```javascript
const url = new URL("http://localhost/master-admin/setting");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/setting`


<!-- END_2501ae328ece545fc1b44e1c0498c44c -->

<!-- START_90c253f8b5737fc9702b0b6fbcd7b840 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/setting/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/setting/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/setting/{setting}`


<!-- END_90c253f8b5737fc9702b0b6fbcd7b840 -->

<!-- START_44b650fe430455bc3fbd5b4ca20a201a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/setting/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/setting/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/setting/{setting}/edit`


<!-- END_44b650fe430455bc3fbd5b4ca20a201a -->

<!-- START_bc0815a56cd27f191033b3a4b63413cc -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/setting/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/setting/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/setting/{setting}`

`PATCH master-admin/setting/{setting}`


<!-- END_bc0815a56cd27f191033b3a4b63413cc -->

<!-- START_17e95079fd35893a954ffb8d6cf26656 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/setting/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/setting/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/setting/{setting}`


<!-- END_17e95079fd35893a954ffb8d6cf26656 -->

<!-- START_50f26adecf8d2b0bcba2f9a260ea1ab9 -->
## master-admin/admin-user/get
> Example request:

```bash
curl -X POST "http://localhost/master-admin/admin-user/get" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/admin-user/get`


<!-- END_50f26adecf8d2b0bcba2f9a260ea1ab9 -->

<!-- START_a8b59337054a8db2dc8c336e7533ded6 -->
## master-admin/admin-user/restore
> Example request:

```bash
curl -X POST "http://localhost/master-admin/admin-user/restore" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/restore");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/admin-user/restore`


<!-- END_a8b59337054a8db2dc8c336e7533ded6 -->

<!-- START_175063db5f6b22e9896603ff83cfecbb -->
## master-admin/admin-user/profile
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/admin-user/profile" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/profile");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/admin-user/profile`


<!-- END_175063db5f6b22e9896603ff83cfecbb -->

<!-- START_c42811b2b25bc71c0a88a72ea03ba886 -->
## master-admin/admin-user/profile/post
> Example request:

```bash
curl -X POST "http://localhost/master-admin/admin-user/profile/post" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/profile/post");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/admin-user/profile/post`


<!-- END_c42811b2b25bc71c0a88a72ea03ba886 -->

<!-- START_f499d7e3aa96b66928c8d3ad12fc35fb -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/admin-user" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/admin-user`


<!-- END_f499d7e3aa96b66928c8d3ad12fc35fb -->

<!-- START_836acb4af9d98cb7350285d75be826d3 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/admin-user/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/admin-user/create`


<!-- END_836acb4af9d98cb7350285d75be826d3 -->

<!-- START_59970908ae6cf65b7365091c3e78e4fe -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/admin-user" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/admin-user`


<!-- END_59970908ae6cf65b7365091c3e78e4fe -->

<!-- START_9a2c5ae5d4f5a535dde0dc911e02f925 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/admin-user/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/admin-user/{admin_user}`


<!-- END_9a2c5ae5d4f5a535dde0dc911e02f925 -->

<!-- START_7f241eab60b8124370854e30514dba33 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/admin-user/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/admin-user/{admin_user}/edit`


<!-- END_7f241eab60b8124370854e30514dba33 -->

<!-- START_e83eacc2a4e2d57ec7f1444edb1881c5 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/admin-user/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/admin-user/{admin_user}`

`PATCH master-admin/admin-user/{admin_user}`


<!-- END_e83eacc2a4e2d57ec7f1444edb1881c5 -->

<!-- START_32522628e272e5ad752392a7b7c69c6f -->
## master-admin/admin-user/{admin_user}
> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/admin-user/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/admin-user/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/admin-user/{admin_user}`


<!-- END_32522628e272e5ad752392a7b7c69c6f -->

<!-- START_0809f28c3dbc17d81df387ab87b3c9fa -->
## master-admin/request/get
> Example request:

```bash
curl -X POST "http://localhost/master-admin/request/get" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/get");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/request/get`


<!-- END_0809f28c3dbc17d81df387ab87b3c9fa -->

<!-- START_c0ec68217891920883a60134cb0d58b1 -->
## master-admin/request/restaurant/update
> Example request:

```bash
curl -X POST "http://localhost/master-admin/request/restaurant/update" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/restaurant/update");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/request/restaurant/update`


<!-- END_c0ec68217891920883a60134cb0d58b1 -->

<!-- START_4b1454ee09daefcd08f092f19fa46278 -->
## master-admin/request/restaurant/{restaurant_id}
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/restaurant/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/restaurant/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/restaurant/{restaurant_id}`


<!-- END_4b1454ee09daefcd08f092f19fa46278 -->

<!-- START_76fd250397edd5b599f4d2699d1748d1 -->
## master-admin/request/delivery/update
> Example request:

```bash
curl -X POST "http://localhost/master-admin/request/delivery/update" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/delivery/update");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/request/delivery/update`


<!-- END_76fd250397edd5b599f4d2699d1748d1 -->

<!-- START_234c7ef920fb16216de0fb5dfb757f57 -->
## master-admin/request/delivery/{restaurant_id}
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/delivery/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/delivery/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/delivery/{restaurant_id}`


<!-- END_234c7ef920fb16216de0fb5dfb757f57 -->

<!-- START_6a6266132814ffdbb78446b0bf71d878 -->
## master-admin/request/takeaway/update
> Example request:

```bash
curl -X POST "http://localhost/master-admin/request/takeaway/update" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/takeaway/update");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/request/takeaway/update`


<!-- END_6a6266132814ffdbb78446b0bf71d878 -->

<!-- START_0f9ebfbd54ea5ee36fb3ff5774b77c4f -->
## master-admin/request/takeaway/{restaurant_id}
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/takeaway/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/takeaway/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/takeaway/{restaurant_id}`


<!-- END_0f9ebfbd54ea5ee36fb3ff5774b77c4f -->

<!-- START_4ca171eb558f907690c02a45c20488b6 -->
## master-admin/request/promotion/update
> Example request:

```bash
curl -X POST "http://localhost/master-admin/request/promotion/update" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/promotion/update");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/request/promotion/update`


<!-- END_4ca171eb558f907690c02a45c20488b6 -->

<!-- START_c5870ff4f0d5918945e3c952c6cd58e1 -->
## master-admin/request/promotion/{restaurant_id}
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/promotion/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/promotion/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/promotion/{restaurant_id}`


<!-- END_c5870ff4f0d5918945e3c952c6cd58e1 -->

<!-- START_d00c2a90939bb616cf6e7c7a6d52dc52 -->
## master-admin/request/menu/{restaurant_id}
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/menu/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/menu/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/menu/{restaurant_id}`


<!-- END_d00c2a90939bb616cf6e7c7a6d52dc52 -->

<!-- START_c5e71c8c9e7f72f81eba1d29024a3ccd -->
## master-admin/request/menu-item/{restaurant_id}
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/menu-item/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/menu-item/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/menu-item/{restaurant_id}`


<!-- END_c5e71c8c9e7f72f81eba1d29024a3ccd -->

<!-- START_19b3e60067615893c3f279c17ee8a462 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request" 
```
```javascript
const url = new URL("http://localhost/master-admin/request");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request`


<!-- END_19b3e60067615893c3f279c17ee8a462 -->

<!-- START_0092099b15f3121ac6e9a14d26d32417 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/create`


<!-- END_0092099b15f3121ac6e9a14d26d32417 -->

<!-- START_3a4dce846938b0661e90883a404c0064 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/master-admin/request" 
```
```javascript
const url = new URL("http://localhost/master-admin/request");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/request`


<!-- END_3a4dce846938b0661e90883a404c0064 -->

<!-- START_5e174b41c9fdbd0e97471eb578b42a1d -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/{request}`


<!-- END_5e174b41c9fdbd0e97471eb578b42a1d -->

<!-- START_97e220de55a945302cd244c7dc9caccd -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/request/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/request/{request}/edit`


<!-- END_97e220de55a945302cd244c7dc9caccd -->

<!-- START_e0a7d2d3dd2e0263a1c216e4dccf6382 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/master-admin/request/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/request/{request}`

`PATCH master-admin/request/{request}`


<!-- END_e0a7d2d3dd2e0263a1c216e4dccf6382 -->

<!-- START_58c3d7648a8775bd0eff4cc11c238daa -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/request/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/request/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/request/{request}`


<!-- END_58c3d7648a8775bd0eff4cc11c238daa -->

<!-- START_940bf197486b02305239214e2e1c62ea -->
## master-admin/report/sales
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/report/sales" 
```
```javascript
const url = new URL("http://localhost/master-admin/report/sales");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/report/sales`


<!-- END_940bf197486b02305239214e2e1c62ea -->

<!-- START_b3d5fad76661b2ef8d628dab20ca0690 -->
## master-admin/report/sales/data
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/report/sales/data" 
```
```javascript
const url = new URL("http://localhost/master-admin/report/sales/data");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/report/sales/data`


<!-- END_b3d5fad76661b2ef8d628dab20ca0690 -->

<!-- START_f4b10d4282feadd106846cb55669172d -->
## master-admin/report/sales/bar
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/report/sales/bar" 
```
```javascript
const url = new URL("http://localhost/master-admin/report/sales/bar");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/report/sales/bar`


<!-- END_f4b10d4282feadd106846cb55669172d -->

<!-- START_0a972b87d9647ca242e7db6c7599d4c6 -->
## master-admin/report/revenue
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/report/revenue" 
```
```javascript
const url = new URL("http://localhost/master-admin/report/revenue");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/report/revenue`


<!-- END_0a972b87d9647ca242e7db6c7599d4c6 -->

<!-- START_25a94a02f12fc3eddb8f6098a46a09ec -->
## master-admin/report/revenue/data
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/report/revenue/data" 
```
```javascript
const url = new URL("http://localhost/master-admin/report/revenue/data");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/report/revenue/data`


<!-- END_25a94a02f12fc3eddb8f6098a46a09ec -->

<!-- START_079b2e301e41e5d5471302426778d67d -->
## master-admin/report/subscription
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/report/subscription" 
```
```javascript
const url = new URL("http://localhost/master-admin/report/subscription");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/report/subscription`


<!-- END_079b2e301e41e5d5471302426778d67d -->

<!-- START_334153d4780ff93f7f038d6298f50362 -->
## master-admin/report/subscription/data
> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/report/subscription/data" 
```
```javascript
const url = new URL("http://localhost/master-admin/report/subscription/data");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/report/subscription/data`


<!-- END_334153d4780ff93f7f038d6298f50362 -->

<!-- START_95ed74c6ac1e5d868121581d1ed403b3 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/payment-method" 
```
```javascript
const url = new URL("http://localhost/master-admin/payment-method");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/payment-method`


<!-- END_95ed74c6ac1e5d868121581d1ed403b3 -->

<!-- START_285d8cd8d0f6d1418f799af1283ef8af -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/payment-method/create" 
```
```javascript
const url = new URL("http://localhost/master-admin/payment-method/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/payment-method/create`


<!-- END_285d8cd8d0f6d1418f799af1283ef8af -->

<!-- START_742a94086e57562533f73653c23498a8 -->
## master-admin/payment-method
> Example request:

```bash
curl -X POST "http://localhost/master-admin/payment-method" 
```
```javascript
const url = new URL("http://localhost/master-admin/payment-method");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST master-admin/payment-method`


<!-- END_742a94086e57562533f73653c23498a8 -->

<!-- START_759413fd8500789cf9ef56528672e744 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/payment-method/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/payment-method/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/payment-method/{payment_method}`


<!-- END_759413fd8500789cf9ef56528672e744 -->

<!-- START_8af217f2d84aea47dce37082d23aff17 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/master-admin/payment-method/1/edit" 
```
```javascript
const url = new URL("http://localhost/master-admin/payment-method/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET master-admin/payment-method/{payment_method}/edit`


<!-- END_8af217f2d84aea47dce37082d23aff17 -->

<!-- START_8a71c5a44e47c23f8da04872c67d1325 -->
## master-admin/payment-method/{payment_method}
> Example request:

```bash
curl -X PUT "http://localhost/master-admin/payment-method/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/payment-method/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT master-admin/payment-method/{payment_method}`

`PATCH master-admin/payment-method/{payment_method}`


<!-- END_8a71c5a44e47c23f8da04872c67d1325 -->

<!-- START_6524cc0180f6a051a484d940ae67119a -->
## master-admin/payment-method/{payment_method}
> Example request:

```bash
curl -X DELETE "http://localhost/master-admin/payment-method/1" 
```
```javascript
const url = new URL("http://localhost/master-admin/payment-method/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE master-admin/payment-method/{payment_method}`


<!-- END_6524cc0180f6a051a484d940ae67119a -->


