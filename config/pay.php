<?php

return [
    'alipay' => [
        'app_id'         => '2016101500689325',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjdSo9YFcUEJFjVyx7YLjaLlhHeCh3bLFuwb7GkDZSx6OGKMaBqhXPEAfg4Y2ubXBhMlNWXixO5XGJzFvY6D6czDLt+icISgT387qCK1N7A9CHLEajvbbG4ON2GnDvUKcdgfh28NU4aHx/BF+DRgf7GsaoJfjx8MZf7JNG/+kKEfZ3O9d73bKlGCj55FzU1/ny4np7c4lUiyXfsOmFOA7pswScuk170ovgXhUl7IiofpsN4OUGyt8diO5cvj7MZEqEsSoScTGOI17VAzPHqf30v8MtkTj0ZOeesK5SZsp5oDOJP5VGQXOeFSYwBscwf/rOE2yTJsdy7azm9CMjslSQwIDAQAB',
        'private_key'    => 'MIIEowIBAAKCAQEAnTqudQli+gy8CxnDQ8ohVyo+Bea/dnB0cQt02cwh5joV57osNADMzgYin3eRI2ZWVuaqmuMdOhShQ+KCTUivSjFnpTX8Vr6UBGfEr2lEAIl4ePVO/d1OSEtY1KAb3NgA1qtprMKcrg90Us1nu/Sfsjkc6POtlvcX4ySNS5psXy6HVyA0sJPUUvIcdYDSzYri2MXuOdW0o/9W/8an9qSUvGMhTNZY/Au+8WItaElLcLhsIl/kmj5Lnvu522uRGg8F0YV9+mp4dGh6EDXXC6E5A//XPNQDj7gzXcQy2GEb1jG0fn7dFkYPdo4DXtmWWUylAgFv+pGZSsiRC7mOystvowIDAQABAoIBADNwXF0b6g7GlcrH7fNCsO+0eUAzAta76cyGI/+RYlHRFROP/CAzVs3cgf1L/+bl9z9NDenIfepfj3cHJvwj2H1cdn09kUXL6d8bF+UPelj2oLxp/SLfAVpzlCdUDmmNHZEd2V/U96+WjMb+Pn7mhEyplMS93D/0rRL6BWQDrIrixv8FPW+bmbn7NVdWNujzP7G7vVjtOJRfTmGx3XARXe/XXA9ETneryGjWkiKGRjiLCNRIBot/z/qzNTb+xNrPrWI4wmrxBLGcugzV2iU9CCuS2YFDYc8s07cYExHEq7xsIwOlTl3a6aPuryAWLAWAQ4seaB3o4eSJbQXZ8AGsK6kCgYEA9pLETgdBuy6mgU6jUVREARU6fkZ0DkXKWNfe8Lu5CM47Q4i0hKy/UVwE9ZOjpwZJs4wfRObys3bZzX1pgM9lwO6NY90tHJI9FglY5CXDfL7sVXHCnzCxF3Q3ECPf0hZkR/PnsvyV2zSwggTE1XIjSWN11hNCPr1lj08D+2Yim00CgYEAoz1/LXEn3QSq8OiRqVzJaVDh1RKGg4VPnxFZGAzh/qgjNgFa0iYgmKeVnByE91nz3lxJZtAsWrJha3y6rX7Ls3Mm2bPwGeir8CIKAndcmiy0+qhrj2U3hqeQGDxe1f4IrPuVmabD08ANcVHNo55iqwm0gQFi6dL928oSAMQRXq8CgYABBQRYykDkVEIOANQ+DtolIwBV61aphHJcwa/DURNnzOqD0fnlHo2/+WBv34dqtmTxoB+0+juAsHogFmesR69FB/d/tTdtidFE2Q8MCnfveR6jD9BdNidVUH61y2Aujzck8QZBQDgiaupb70cdFta8g/PFydiZR9E2sX3zuS1ldQKBgHN03ou0ef5v+7uysru4Hdi4VVJP7QX+9ybJrVs+WWW1ZFohMSxrvShbd4zX+w+79qlyWpQ2bvijLBZLPPnTMZ41tufJxet9TobkfHHsHHoLXuHe11yvuUsrHtaVdHokV9yJgPERK3aMYrWgpzKvppfUoG+SHHTHP7gBvyP9iU+PAoGBAMyslNYzv24ZHR414hhdH65BQlNVuc11rJdUpAaAOSAiHu6KM3rJHmAuJQs2HElOHjLP6EPUjLnr4LQ4XsNcIogysRn0phq1trL+VA1U/PMnidHkeDp8h0ATgXc/t53x65c2Jtw/7Mz/GxTGZqDAnWjDEBXlcqnNu6QyCg+c1JgL',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
