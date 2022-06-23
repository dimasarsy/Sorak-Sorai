<div id="myModalVerif" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="background-modal-verif">

            <div class="verif">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" id="closeBtn" class="btn-close-popup"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                </div>


                <h5>Anda belum mempunyai akun. Buat akun sekarang untuk bisa menikmati keseruan Sorak Sorai!</h5>

                <div class="modal-footer">
                    <a href="/register" class="btn modal-btn-verif">Buat Akun</a>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModalVerif');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("btn-close-popup")[0];

    document.addEventListener("DOMContentLoaded", function(event) {
        modal.style.display = "block";
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>