![introduce](introduce.png)

# Yêu cầu
[Livewire](https://laravel-livewire.com/docs/2.x/installation)

[Tailwind](https://tailwindcss.com/docs/installation)

# Cài đặt
`composer require hrm/laravel-comment`
## Publish 
`php artisan vendor:publish --tag=public`

`php artisan vendor:publish --tag=views`

`php artisan vendor:publish --tag=emotions`

`php artisan vendor:publish --tag=config`

`php artisan vendor:publish --tag=helper`

## Migrations

`php artisan migrate`

Thêm Trait vào Model

`use HasComment;`

Thêm helper vào `composer.json` như mẫu dưới



```json
 "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        },
        "files": [
            "app/Helper/hrm_time_helper.php"
        ]
    },
```

## Cách dùng

Thêm commponent sau vào nơi hiển thị comment
`$post` là model của bạn

`<livewire:form-component :model="$post" :key="time().$post->id">`





