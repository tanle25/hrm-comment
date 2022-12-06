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

## Migrations

`php artisan migrate`

Thêm Trait vào Model

`use HasComment;`

## Cách dùng

Thêm commponent sau vào nơi hiển thị comment
`$post` là model của bạn

`<livewire:form-component :model="$post" :key="time().$post->id">`



