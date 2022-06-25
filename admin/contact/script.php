<!-- <script type="text/javascript">
    function ReadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#contact_img").change(function() {
        ReadURL(this);
    });
</script> -->
<!-- preview -->
<script>
    const wrapper = document.querySelector(".wrapper");
    const fileName = document.querySelector(".file-name");
    const defaultBtn = document.querySelector("#default-btn");
    const customBtn = document.querySelector("#custom-btn");
    const cancelBtn = document.querySelector("#cancel-btn i");
    const img = document.querySelector("img");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    function defaultBtnActive() {
        defaultBtn.click();
    }
    defaultBtn.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            cancelBtn.addEventListener("click", function() {
                img.src = "";
                wrapper.classList.remove("active");
            })
            reader.readAsDataURL(file);
        }
        if (this.value) {
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
        }
    });
</script>
<script src="../user/contact/assets/jquery.min.js"></script>
<script src="../user/contact/assets/script.js"></script>