

    <footer>
        <div class="container footer_container">
            <article class="about_footer">
                <div>
                    <h4>Create QR code</h4>
                    <p>This is a project made my Rakesh singh</p>
                </div>
                <div>
                    <h5>Admin Power: </h5>
                    <ul>
                        <li>create unlimated QR code, with unlimated traffic on QR code.</li>
                        <li>See all QR code created my users and can edit any QR code property</li>
                        <li>Create Users and can active or deactive any users and their property</li>
                        <li>See the report of any QR code created by users</li>
                    </ul>
                </div>
                <div>
                    <h5>Users Power: </h5>
                    <ul>
                        <li>create limated QR code, with limated traffic on QR code.</li>
                        <li>can not see QR code created my other users</li>
                        <li>Can not access Users page</li>
                        <li>Can only see the report of QR code created by own</li>
                    </ul>
                </div>
            </article>
            <article class="menu_footer">
                <h4>Menu</h4>
                <ul>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="user.php">Users</a></li>
                    <li><a href="qr_code.php">QR code</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </article>
            <article class="contact_footer">
                <h4>Contact</h4>
                <div>
                    <ul>
                        <li>Email: rakeshkr888899@gmail.com</li>
                    </ul>
                    <div class="contact_social_footer">
                        <a href="https://github.com/rakeshkr8888" target="_blank"><span><i
                                    class="uil uil-github"></i></span></a>
                        <a href="https://www.linkedin.com/in/rakesh-singh-86590421b/" target="_blank"><span><i
                                    class="uil uil-linkedin"></i></span></a>
                    </div>
                </div>
                </articel>
        </div>
        <article class="copy_right_footer">
            <p>Rakesh Singh &copy All Right Reserved</p>
        </article>
    </footer>
    <!-- ================== END OF FOOTER =====================  -->





    <script>
        const nav_menu_btn = document.querySelector(".nav_menu_btn");
        const nav_menu_items = document.querySelector(".nav_items");

        nav_menu_btn.addEventListener("click", () => {
            nav_menu_items.classList.toggle('toggle_nav_items')
            const nav_menu_btn_icon = nav_menu_btn.querySelector('span i');
            if (nav_menu_btn_icon.className == "uil uil-times") {
                nav_menu_btn_icon.className = "uil uil-bars";
            }
            else {
                nav_menu_btn_icon.className = "uil uil-times";
            }
        })


        window.addEventListener("scroll", () => {
            document.querySelector("nav").classList.toggle("window-scroll", window.scrollY > 0);
        });
    </script>

</body>

</html>