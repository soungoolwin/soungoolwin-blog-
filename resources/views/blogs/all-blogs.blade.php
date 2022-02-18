@if ($bloglanguage==='myanmar')
<livewire:myanblogs>
    <!-- this will go to Myanblogs (live wire)  Model --->
    @endif

    @if ($bloglanguage==='english')
    <livewire:engblogs>
        <!-- this will go to Engblogs (live wire)  Model --->
        @endif