<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">СRUD</h1>

    @if (session()->has('message'))
        <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-green-800">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow p-6 mb-9">
        <a href="{{ route('navigation') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold">
            Назад
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">
            {{ $isEditing ? 'Редактировать пост' : 'Создать пост' }}
        </h2>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Заголовок</label>
            <input
                type="text"
                wire:model="title"
                class="w-full border rounded-lg px-3 py-2"
            >
            @error('title')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Содержимое</label>
            <textarea
                wire:model="content"
                rows="5"
                class="w-full border rounded-lg px-3 py-2"
            ></textarea>
            @error('content')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex gap-2">
            @if ($isEditing)
                <button
                    wire:click="update"
                    class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition duration-200"
                >
                    Обновить
                </button>

                <button
                    wire:click="cancel"
                    class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition duration-200"
                >
                    Отмена
                </button>
            @else
                <button
                    wire:click="store"
                    class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition duration-200"
                >
                    Создать
                </button>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Список постов</h2>

        <div class="space-y-4">
            @forelse ($posts as $post)
                <div class="border rounded-xl p-4">
                    <h3 class="text-lg font-bold">{{ $post->title }}</h3>
                    <p class="mt-2 text-gray-700">{{ $post->content }}</p>

                    <div class="mt-4 flex gap-2">
                        <button
                            wire:click="edit({{ $post->id }})"
                            class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition duration-200"
                        >
                            Редактировать
                        </button>

                        <button
                            wire:click="delete({{ $post->id }})"
                            class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition duration-200"
                        >
                            Удалить
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Постов пока нет.</p>
            @endforelse
        </div>
    </div>
</div>


