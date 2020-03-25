<!doctype html>
<html lang="en">
    <head>
        <title>@yield('title')</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
        <style>
            * {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            body {
                padding: 0;
                margin: 0;
            }

            #res-404-page {
                position: relative;
                height: 100vh;
            }

            #res-404-page .res-404-page {
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

            .res-404-page {
                max-width: 520px;
                width: 100%;
                line-height: 1.4;
                text-align: center;
            }

            .res-404-page .error-page-section {
                position: relative;
                height: 240px;
            }

            .res-404-page .home-btn {
                font-family: 'Montserrat', sans-serif;
                display: inline-block;
                font-weight: 700;
                text-decoration: none;
                background-color: transparent;
                border: 2px solid #000000;
                color: #000000;
                text-transform: uppercase;
                padding: 13px 25px;
                font-size: 18px;
                border-radius: 40px;
                margin: 7px;
                -webkit-transition: 0.2s all;
                transition: 0.2s all;
            }

            .res-404-page .error-page-section h1 {
                font-family: 'Montserrat', sans-serif;
                position: absolute;
                left: 50%;
                top: 50%;
                color: #262626;
                text-transform: uppercase;
                letter-spacing: -40px;
                margin-left: -20px;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                font-size: 252px;
                font-weight: 900;
                margin: 0px;
            }

            .res-404-page .error-page-section h1>span {
                text-shadow: -8px 0px 0px #fff;
            }

            .res-404-page .error-page-section h3 {
                text-transform: uppercase;
                color: #262626;
                margin: 0px;
                letter-spacing: 3px;
                padding-left: 6px;
                font-family: 'Cabin', sans-serif;
                position: relative;
                font-size: 16px;
                font-weight: 700;
            }

            .res-404-page h2 {
                font-family: 'Cabin', sans-serif;
                font-size: 20px;
                text-transform: uppercase;
                color: #000;
                margin-top: 0px;
                margin-bottom: 25px;
                font-weight: 400;
            }

            @media only screen and (max-width: 767px) {
                .res-404-page .error-page-section {
                    height: 200px;
                }
                .res-404-page .error-page-section h1 {
                    font-size: 200px;
                }
            }

            @media only screen and (max-width: 480px) {
                .res-404-page .error-page-section {
                    height: 162px;
                }
                .res-404-page .error-page-section h1 {
                    font-size: 162px;
                    height: 150px;
                    line-height: 162px;
                }
                .res-404-page h2 {
                    font-size: 16px;
                }
            }

        </style>

    </head>
    <body>
        <div id="res-404-page">
            <div class="res-404-page">
                <div class="error-page-section">
                    <h3>@yield('sub_title')</h3>
                    <h1><span>@yield('code_', __('Oh no'))</span><span>@yield('code_1', __('Oh no'))</span><span>@yield('code_2', __('Oh no'))</span></h1>
                </div>
                <h2>@yield('message')</h2>
                <a href="{{ url('/') }}" class="home-btn">{{ __('Go Home') }}</a>
            </div>
        </div>
    </body>
</html>
