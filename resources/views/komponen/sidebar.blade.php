<main class="bg-gradient-to-b bg-sky-500 w-80 h-screen shadow-lg flex flex-col justify-between">
    <div class="p-4">
        <div class="flex justify-center py-4">
            <img src="../img/sadik.png" alt="Logo Puskesmas" class="w-24 h-24 rounded-full shadow-lg border-4 border-white transform transition duration-300 hover:scale-105">
        </div>
        
        <h2 class="text-3xl font-bold text-white text-center ">Menu Admin</h2>
        <hr class=" border-white border-2 mt-6">
        <ul class="mt-6 space-y-6">
            <li>
                <a href="/admin/profil"
                    class="flex items-center p-4 rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                    <i class="fas fa-user text-2xl mr-4 text-white"></i>
                    <span class="text-xl font-semibold text-white">Profil</span>
                </a>
            </li>
            <li>
                <!-- Dropdown Trigger for Menu Antrian -->
                <div class="relative">
                    <button onclick="toggleDropdown()"
                        class="flex items-center w-full p-4 rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out focus:outline-none">
                        <i class="fas fa-clipboard-list text-2xl mr-4 text-white"></i>
                        <span class="text-xl font-semibold text-white">Loket</span>
                        <i class="fas fa-chevron-down text-xl ml-auto text-white"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <ul id="dropdown" class="hidden mt-2  overflow-hidden font-bold text-xl ">
                        <li>
                            <a href="/admin/loketSatu"
                                class="block px-6 py-3 text-white hover:bg-sky-600 transition duration-300 rounded-lg">
                                Loket 1 (Umum)
                            </a>
                        </li>
                        <li>
                            <a href="/admin/loketDua"
                                class="block px-6 py-3 text-white hover:bg-sky-700 transition duration-300 rounded-lg">
                                Loket 2 (Prioritas)
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="/admin/rekap"
                    class="flex items-center p-4 rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                    <i class="fas fa-file-alt text-2xl mr-4 text-white"></i>
                    <span class="text-xl font-semibold text-white">Rekap</span>
                </a>
            </li>
            <li>
                <a href="/user/monitor"
                    class="flex items-center p-4 rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                    <i class="fas fa-tv text-2xl mr-4 text-white"></i>
                    <span class="text-xl font-semibold text-white">Monitor</span>
                </a>
            </li>
            <li>
                <a href="/admin/login" class="flex items-center p-4 rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                    <i class="fas fa-sign-out-alt text-2xl mr-4 text-white"></i>
                    <span class="text-xl font-semibold text-white">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="p-4">
        <p class="text-center text-white">© 2024 Puskesmas Kuin Raya</p>
    </div>
</main>

<!-- JavaScript Sidebar -->

<script src="{{ asset('js/komponen/sidebar.js') }}"></script>

