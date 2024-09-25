@props(['item'])

<div {{ $attributes->merge(['class' => 'swiper-slide']) }}>
    <div class="top-contacts-box">
        <div class="profile-img online">
            <a href="javascript:;">
                <img loading="lazy" src="{{ $item->avatar }}" alt="Image" />
            </a>
        </div>
    </div>
</div>