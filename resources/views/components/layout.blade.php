<x-.header></x-.header>

<div class="layout-page">
    <!-- Navbar -->
    <x-.navbar></x-.navbar>
    <!-- / Navbar -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        {{ $slot }}

        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div
                    class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , by <a href="#" target="_blank" class="footer-link">PT SENA</a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>

<x-.footer></x-.footer>
