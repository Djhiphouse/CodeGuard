<div>


    <x-tittle-bar title="Willkommen zurück," value="Djhiphouse"></x-tittle-bar>


    <!-- Dashboard content goes here -->
    <section class="p-4 flex w-full flex-col space-y-6 sm:space-y-3">
        <div class="w-full h-[80%] justify-center items-center flex flex-col sm:space-x-2 space-y-3 sm:space-y-0 sm:flex-row">
            <!-- Card -->

            <div class="bg-gray-900 p-5 rounded-lg w-full shadow-lg transition duration-200 hover:-translate-y-2 ease-in-out delay-75 translate-y-0 hover:bg-green-700">
                <h2 class="text-3xl font-bold mb-2">Benutzer</h2>
                <p class="text-gray-400 text-xl">{{\App\Models\User::all()->count()}}</p>
            </div>

            <div class="bg-gray-900 p-5 rounded-lg w-full shadow-lg transition duration-200 hover:-translate-y-2 ease-in-out delay-75 translate-y-0 hover:bg-green-700">
                <h2 class="text-3xl font-bold mb-2">Licenses</h2>
                <p class="text-gray-400 text-xl">{{\App\Models\License::all()->count()}}</p>
            </div>
            <!-- Repeat for other cards -->
        </div>

        <div class="w-full h-[60%] justify-center items-center flex flex-col sm:space-x-2 space-y-3 sm:space-y-0 sm:flex-row">
            <!-- Card -->
            <div class="bg-gray-900 min-h-44 p-5 rounded-lg w-full shadow-lg transition duration-200 hover:-translate-y-2 ease-in-out delay-75 translate-y-0 hover:bg-green-700">
                <h2 class="text-3xl font-bold mb-2">Einrichtung</h2>
                <p class="text-gray-400 text-sm">Befolge sich alle Schritte die ihnen bei der Einrichtung gezeigt werden. für die Optimale benutzung. Ich habe was falsch gemach!</p>
                <button type="button" wire:click="setupDevice" class="w-full mt-3 sm:mt-5 rounded bg-green-500 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Neu einrichten</button>

            </div>

            <div class="bg-gray-900 min-h-44 p-5 rounded-lg w-full h-full shadow-lg transition duration-200 hover:-translate-y-2 ease-in-out delay-75 translate-y-0 hover:bg-green-700">
                <h2 class="text-3xl font-bold mb-2">Wichtig</h2>
                <p class="text-gray-400 text-sm">Sobald das gerät einmal eingerichtet wurde, Stellen sie ees an der Gleichen Stelle ab wie am Einrichte Ort.</p>
            </div>

            <div class="bg-gray-900 min-h-44 p-5 rounded-lg w-full shadow-lg transition duration-200 hover:-translate-y-2 ease-in-out delay-75 translate-y-0 hover:bg-green-700">
                <h2 class="text-3xl font-bold mb-2">Nächstes Upgrade</h2>
                <p class="text-gray-400 text-xl">Kein Upgrade verfügbar</p>
            </div>
            <!-- Repeat for other cards -->
        </div>


    </section>
</div>




</div>
