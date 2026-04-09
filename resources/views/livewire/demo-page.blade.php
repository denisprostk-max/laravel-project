<div class="max-w-4xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-8 text-center">Livewire</h1>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-6">

        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-semibold mb-4">1. wire:model</h2>

            <input
                type="text"
                wire:model.live="name"
                placeholder="Введите имя"
                class="w-full border rounded-lg px-4 py-2 mb-4"
            >

            <p class="text-gray-700">
                Привет,
                <span class="font-bold text-blue-600">
                    {{ $name ?: 'гость' }}
                </span>
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-semibold mb-4">2. Счётчик</h2>

            <div class="flex items-center gap-4 mb-4">
                <button
                    wire:click="decrement"
                    class="bg-blue-600 hover:bg-red-600 text-white px-4 py-2 rounded-lg"
                >
                    -1
                </button>

                <span class="text-2xl font-bold">{{ $count }}</span>

                <button
                    wire:click="increment"
                    class="bg-blue-600 hover:bg-green-600 text-white px-4 py-2 rounded-lg"
                >
                    +1
                </button>
            </div>

            <p class="text-gray-600">Значение меняется без перезагрузки страницы.</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 md:col-span-2">
            <h2 class="text-xl font-semibold mb-4">3. Добавление задачи</h2>

            <div class="flex flex-col md:flex-row gap-3 mb-3">
                <input
                    type="text"
                    wire:model="newTask"
                    placeholder="Введите новую задачу"
                    class="w-full border rounded-lg px-4 py-2"
                >

                <button
                    wire:click="addTask"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg"
                >
                    Добавить
                </button>
            </div>

            @error('newTask')
            <p class="text-red-500 mb-3">{{ $message }}</p>
            @enderror
        </div>

        <div class="bg-white rounded-2xl shadow p-6 md:col-span-2">
            <h2 class="text-xl font-semibold mb-4">4. Поиск по списку</h2>

            <input
                type="text"
                wire:model.live="search"
                placeholder="Поиск задачи..."
                class="w-full border rounded-lg px-4 py-2 mb-4"
            >

            <div class="space-y-3">
                @forelse ($this->filteredTasks as $index => $task)
                    <div class="flex items-center justify-between bg-gray-50 border rounded-xl px-4 py-3">
                        <span>{{ $task }}</span>

                        <button
                            wire:click="removeTask({{ $index }})"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg"
                        >
                            Удалить
                        </button>
                    </div>
                @empty
                    <p class="text-gray-500">Ничего не найдено.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
