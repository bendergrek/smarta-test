<x-layouts.app :title="__('Dashboard')">

    <div class="flex-1 max-md:pt-6 self-stretch">
        <flux:heading size="xl" level="1">Информация о группе курсов</flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Группа  {{ $group->name }}, выбрано курсов:  {{ $group->courses()->count() }}. </flux:text>
        <flux:separator variant="subtle" />
    </div>

    <flux:input disabled label="Название группы" value="{{ $group->name }}"/>

    <flux:checkbox.group class="mt-3">
        @foreach($group->courses as $course)
            <flux:checkbox checked
                value="{{ $course->id }}"
                label="{{ $course->code }}"
                description="{{ $course->name }}"
                disabled
            />
        @endforeach
    </flux:checkbox.group>

</x-layouts.app>
