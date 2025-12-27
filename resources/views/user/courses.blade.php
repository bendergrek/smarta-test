<x-layouts.app :title="__('Dashboard')">

    <div class="flex-1 max-md:pt-6 self-stretch">
        <flux:heading size="xl" level="1">Мои курсы</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Вы можете выбрать любое количество курсов</flux:text>
        <flux:separator variant="subtle" />
    </div>

    <form action="{{ route('user.courses.update') }}" method="POST" class="mt-3">
        @csrf
        @method('POST')

        <flux:checkbox.group>
            @foreach($courses as $course)
                <flux:checkbox
                    name="courses[]"
                    value="{{ $course->id }}"
                    label="{{ $course->code }}"
                    description="{{ $course->name }}"
                    :checked="in_array($course->id, $userCourseIds)"
                />
            @endforeach
        </flux:checkbox.group>

        <flux:separator variant="subtle" class="mt-2"/>

        <flux:button
            variant="primary"
            class="mt-4 float-end"
            type="submit"
            color="teal">Сохранить</flux:button>
    </form>

</x-layouts.app>
