<x-layouts.app :title="__('Dashboard')">

    <div class="flex-1 max-md:pt-6 self-stretch">
        <flux:heading size="xl" level="1">Курсы
            <form action="{{ route('courses.sync') }}" method="POST" class="block float-end">
                @csrf
                @method('POST')
                <flux:button
                    variant="primary"
                    type="submit"
                    icon="arrow-down-tray"
                    color="teal">Синхронизировать справочник курсов</flux:button>
            </form>
        </flux:heading>
        <flux:text class="mb-6 mt-2 text-base">Вы можете синхронизировать курсы</flux:text>
        <flux:separator variant="subtle" />
    </div>

    <livewire:tables.course-table/>
</x-layouts.app>
