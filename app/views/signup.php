    <div class="form w-[95%] m-auto">
        <h2 class="form_header py-3 text-lg">Inscription :</h2>
        <form class="w-[80%] md:w-[400px] p-5 border shadow-md rounded-md border-gray-300 m-auto grid grid-cols-2 gap-2" id="form" method="POST">
            <div class="col-span-2">
                <label for="pseudo">Pseudo :</label>
                <input type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="pseudo" id="pseudo" required>
            </div>
            <div class="sm:col-span-1 col-span-2">
                <label for="lastname">Nom :</label>
                <input type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="lastname" id="lastname" required>
            </div>
            <div class="sm:col-span-1 col-span-2">
                <label for="firstname">Prénom :</label>
                <input type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="firstname" id="firstname" required>
            </div>
            <div class="sm:col-span-1 col-span-2">
                <label for="email">Email :</label>
                <input type="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" name="email" id="email" required>
            </div>
            <div class="sm:col-span-1 col-span-2">
                <label for="password">Mot de passe :</label>
                <input type="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" id="password" required>
            </div>
            <div class="sm:col-span-1 col-span-2">
                <label for="genre">Genre :</label>
                <select class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="genre" id="genre" required>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="sm:col-span-1 col-span-2">
                <label for="birthdate">Date de naissance :</label>
                <input type="date" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" name="birthdate" id="birthdate" required>
            </div>
            <button class="col-span-2 rounded-md bg-indigo-600 px-3.5 py-2.5 active:scale-95 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">S'inscrire</button>
        </form>
    </div>

    <script src="../app/js/register.js"></script>