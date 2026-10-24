<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Hero Section - Ilumi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @php
        $image = !empty($data['image_background'])
            ? asset('storage/' . $data['image_background'])
            : 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=2000&q=80';
    @endphp

    <section class="relative flex min-h-screen items-center overflow-hidden bg-gray-900 px-8 py-20 text-white">
        <img
            src="{{ $image }}"
            alt="Hero background"
            class="absolute inset-0 h-full w-full object-cover opacity-40"
        >

        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 mx-auto w-full max-w-6xl">
            <h1 class="max-w-3xl text-4xl font-bold leading-tight md:text-7xl">
                {{ $data['heading_1'] ?? 'Heading Hero Section' }}
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-white/90">
                {{ $data['description'] ?? '' }}
            </p>

            @if (!empty($data['cta_text']))
                <a href="#" class="mt-8 inline-block rounded-md bg-white px-8 py-3 font-semibold text-gray-900">
                    {{ $data['cta_text'] }}
                </a>
            @endif
        </div>
    </section>
</body>
</html>
