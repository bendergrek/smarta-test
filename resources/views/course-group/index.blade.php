<x-layouts.app :title="__('Dashboard')">

    <div class="flex items-center justify-between">
        <div class="flex-1 max-md:pt-6 self-stretch">
            <flux:heading size="xl" level="1">Группы курсов
                <flux:button
                    class="float-end"
                    variant="primary"
                    href="{{ route('course-groups.create') }}"
                    color="teal">
                    Создать группу
                </flux:button>
            </flux:heading>
            <flux:text class="mb-6 mt-2 text-base">Вы можете создать группу курсов. Группа может состоять не более чем из трех курсов.</flux:text>
            <flux:separator variant="subtle" />
        </div>
    </div>

    <livewire:tables.course-group-table/>

</x-layouts.app>
