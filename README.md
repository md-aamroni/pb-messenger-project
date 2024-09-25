<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Author Signature
```shell
cat aamroni.txt
```

### PHP Code Linter
```shell
./vendor/bin/pint
```

### Cron Job (cPanel)
```shell
/usr/local/bin/php /home/{user}/{path}/artisan queue:work --stop-when-empty >> /dev/null 2>&1
```

### Dynamic Component
```html
@foreach($collection as $n => $each)
<x-dynamic-component :component="$each->elem" :converse="$each->converse" :side="$each->side" />
@endforeach
```

### Blade Components
```txt
online-status - To preview just the online user with image and badge
chats-divider - Split the chat message with timestamp
chats-content - Base layout for each sender and receiver context
chats-profile - It's used to get the profile basic information excl. image
chats-creator - Get the profile avatar
chats-reactor - Each context able to share and react with emoji
chats-actions - During conversation each one has the similar action to do something
emoji-default - Define the base variant of emoji's
```

```txt
voice  - Audio or voice message
video  - Youtube link Only
links  - 
press  - Typing event listener
reply  - General message context
media  - One or more image gallery
files  - Document or file attachment
```

### Get notification via pusher
```html
<script type="text/javascript">
    Pusher.logToConsole = true;

    const pusher = new Pusher('88e888678801e801b9e9', {
        cluster: 'ap1'
    });

    const channel = pusher.subscribe('anonymous-channel');
    channel.bind('anonymous-register', function (data) {
        alert(JSON.stringify(data));
    });
</script>
```