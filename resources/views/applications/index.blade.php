@vite(['resources/css/applications.css'])
@props(['applications', 'vacancy' => null])

<x-site-layout title="Reacties">

    @if(empty($vacancy))

        <h1>Jouw reacties</h1>

    @else

        <h1>Reacties op {{ $vacancy->name }}</h1>

    @endif

    <section id="applicationContainer">

        @if($applications->isEmpty())
            <p>Er zijn geen reacties</p>
        @else

            @foreach($applications as $key => $application)

                @php
                    //Get the correct vacancy once to prevent unneeded database calls
                    if ($vacancy) {
                        $currentVacancy = $vacancy;
                    } else {
                        $currentVacancy = $application->vacancy;
                    }
                @endphp

                <article class="application">

                    <p>Vacature #{{ $key + 1 }}</p>

                    @if($currentVacancy !== $vacancy)
                        <h2>{{ $currentVacancy->name }}</h2>
                        <p>Er staan {{ $applications->count() }} mensen in de wachtrij</p>
                    @endif

                    <div class="requirementContainer">

                        @php
                            $applicationRequirements = $application->requirements;
                        @endphp

                        @foreach($currentVacancy->requirements as $vacancyRequirement)

                            @php
                                $isMet = $applicationRequirements->contains($vacancyRequirement);
                            @endphp

                            <article class="{{ $isMet ? 'met' : 'not-met' }}">

                                <h3>{{ $vacancyRequirement->name }}</h3>

                                <p>Voldoet{{ $isMet ? '' : ' niet' }}</p>

                            </article>

                        @endforeach

                    </div>

                    <div class="timeSlotContainer">

                        @php
                            $applicationTimeSlots = $application->timeSlots;
                        @endphp

                        @foreach($currentVacancy->timeSlots as $vacancyTimeSlot)

                            @php
                                $isMet = $applicationTimeSlots->contains($vacancyTimeSlot);
                            @endphp

                            <article class="{{ $isMet ? 'met' : 'not-met' }}">

                                <h3>{{ $vacancyTimeSlot->day->name }}</h3>
                                <p>Van {{ $vacancyTimeSlot->start_time }} tot {{ $vacancyTimeSlot->end_time }}</p>

                                @if($vacancyTimeSlot->optional)
                                    <p>Optioneel</p>
                                @endif

                                <p>Voldoet{{ $isMet ? '' : ' niet' }}</p>

                            </article>

                        @endforeach

                    </div>

                    @if(!$vacancy)

                        <div class="queuePositionContainer">
                            <p>Jij staat op
                                #{{ $currentVacancy->applications->where('status', '=', 1)->search($application) + 1 }}
                                in de wachtrij.</p>
                        </div>

                    @endif


                </article>

            @endforeach

        @endif

    </section>

</x-site-layout>
