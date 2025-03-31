
<form class="m-auto mt-10 border shadow-lg w-fit p-4 border-gray-400 rounded-md flex flex-col gap-3" id="formStepTwo" method="POST">
    <h1 class="mb-3 text-lg">registr :</h1>
    <div>
        <label for="hobbie">Choisissez un loisir :</label>
        <input type="text" list="hobbie" name="hobbie" id="hobbies" class=" w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Choisir un loisir ...">
        <datalist id="hobbie">
            <option value="Automobile"></option>
            <option value="Voyages"></option>
            <option value="Musique"></option>
            <option value="Sport"></option>
            <option value="Lecture"></option>
        </datalist>
    </div>

    <div>
        <label for="image">Télécharger une image :</label>
        <input type="file" accept=".png,.jpeg,.jpg,.webp,.svg" name="image" id="image" class=" w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
    </div>

    <div>
        <label for="city">Choisissez votre ville :</label>
        <input type="text" list="city" name="city" id="citys" class=" w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Choisir votre ville...">
        <datalist id="city">
            <option value="Lyon"></option>
            <option value="Paris"></option>
            <option value="Marseille"></option>
            <option value="Toulouse"></option>
            <option value="Bordeaux"></option>
        </datalist>
    </div>

    <button class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">Enregistrer les données</button>
</form>

<script src="/app/js/registerStepTwo.js"></script>