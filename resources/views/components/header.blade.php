<headers>
    @include('components.modalRegister')
    @include('components.modalLogin')
    <header>
        <div
            class="container fixed top-0 z-40 gap-2 h-16 bg-white w-full sm:max-w-[500px] shadow flex items-center justify-between py-2 px-4">
            <!-- Logo -->
            <div class="flex items-center w-2/12">
                <a href="/">
                    <img alt="Lazismu Logo" class="h-10 sm:h-12" src="{{ asset('image/logoOrange.png') }}" width="50" />
                </a>
            </div>

            <!-- Search Bar -->
            <div class="w-8/12 sm:w-10/12">
                <div class="relative">
                    <input onkeydown="handleSearch(event)" id="searchInput"
                        class="w-full py-2 px-4 rounded-full shadow border border-gray-100 focus:outline-none text-sm sm:text-base"
                        placeholder="Cari Campaign" type="text" />
                    <i class="fas fa-search absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-400"></i>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-2 sm:space-x-4" id="userActions">
                <a class="text-gray-600 hover:text-orange-500 text-sm sm:text-base" id="loginButton" href="#"
                    onclick="showModal()">Masuk</a>
                <a id="registerButton" onclick="showRegisterModal()"
                    class="bg-orange-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm sm:text-base"
                    href="#">Daftar</a>
            </div>
        </div>
    </header>
</headers>
<script>
    const apiUrl = "{{ env('API_URL') }}";
</script>
<script>
    const token = localStorage.getItem('TK');
    document.addEventListener("DOMContentLoaded", () => {
        updateUserUI();
        getMe();
    });

    function handleSearch(event) {
        if (event.key === "Enter") {
            const searchTerm = document.getElementById("searchInput").value;
            if (searchTerm.trim()) {
                window.location.href = `searchCampaign?query=${encodeURIComponent(
                searchTerm
            )}`;
            }
        }
    }

    // Show the modal
    function showModal() {
        const modal = document.getElementById('loginModal');
        modal.classList.remove('hidden');
    }

    function showRegisterModal() {
        const modal = document.getElementById('registerModal');
        modal.classList.remove('hidden');
        document.getElementById('name1').value = '';
        document.getElementById('phoneNumber1').value = '';
    }

    function getMe() {
        if (!token) {
            console.error("Token is missing.");
            return;
        }

        fetch(`${apiUrl}/get-me`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${token}` // Include the token in the Authorization header
                },
            })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                // Store name and phone number in localStorage
                localStorage.setItem("nm", data.name);
                localStorage.setItem("pn", data.phone_number);

                // Call updateUserUI function to update the user interface
                if (typeof updateUserUI === "function") {
                    updateUserUI();
                }
            })
            .catch((error) => {
                console.error("Failed to fetch user data:", error);
            });
    }


    // Function to update header UI with user's name and logout button
    function updateUserUI() {
        const userName = localStorage.getItem('nm');
        const userActions = document.getElementById('userActions');

        if (userName) {
            // User is logged in, show user name and logout button
            const userNameElement = document.createElement('span');
            userNameElement.className = 'text-gray-600 text-sm sm:text-base line-clamp-2 cursor-pointer';
            userNameElement.textContent = userName;

            // Add onclick event to redirect to profile page
            userNameElement.onclick = function() {
                window.location.href = '/profile'; // Redirect to the profile page
            };

            // Logout button
            const logoutButton = document.createElement('a');
            logoutButton.href = "#";
            logoutButton.className = 'bg-red-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm sm:text-base';
            logoutButton.textContent = 'Logout';
            logoutButton.onclick = function() {
                // Clear localStorage
                localStorage.removeItem('TK');
                localStorage.removeItem('nm');
                localStorage.removeItem('pn');
                // Update UI after logout
                updateUserUI();
                Swal.fire({
                    icon: 'success',
                    title: 'Logged out successfully!',
                    text: 'You have been logged out.',
                    confirmButtonText: 'OK'
                });
            };

            // Clear previous content and update UI
            userActions.innerHTML = '';
            userActions.appendChild(userNameElement);
            userActions.appendChild(logoutButton);
        } else {
            // User is not logged in, show login and register buttons
            const loginButton = document.createElement('a');
            loginButton.className = 'text-gray-600 hover:text-orange-500 text-sm sm:text-base';
            loginButton.href = "#";
            loginButton.onclick = function() {
                showModal();
            };
            loginButton.textContent = 'Masuk';

            const registerButton = document.createElement('a');
            registerButton.className =
                'bg-orange-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm sm:text-base';
            registerButton.href = "#";
            registerButton.onclick = function() {
                showRegisterModal();
            };
            registerButton.textContent = 'Daftar';

            // Clear previous content and update UI
            userActions.innerHTML = '';
            userActions.appendChild(loginButton);
            userActions.appendChild(registerButton);
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
