<x-layouts.app :title="__('Dashboard')">

    <div class="flex-1 max-md:pt-6 self-stretch">
        <flux:heading size="xl" level="1">Создание новой группы курсов</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Необходимо задать название и выбрать курсы. Группа может состоять не более чем из трех курсов.</flux:text>
        <flux:separator variant="subtle" />
    </div>

    <form action="{{ route('course-groups.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mt-2">
            <flux:input
                name="name"
                type="text"
                label="Название группы курсов:"
            />
        </div>

        <flux:checkbox.group class="mt-3">
            @foreach($courses as $course)
                <flux:checkbox
                    class="course-checkbox"
                    name="courses[]"
                    value="{{ $course->id }}"
                    label="{{ $course->code }}"
                    description="{{ $course->name }}"
                />
            @endforeach
        </flux:checkbox.group>
        <flux:separator variant="subtle" class="mt-2"/>
        <flux:button
            class="mt-4 float-end"
            variant="primary"
            type="submit"
            color="teal">Сохранить</flux:button>
    </form>

</x-layouts.app>
