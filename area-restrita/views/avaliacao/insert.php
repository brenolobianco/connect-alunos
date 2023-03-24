<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <?php include_once 'controllers/avaliacao/ControllerInsert.php';?>
                </div>
                <div class="col-md-12">
                    <div class="card-box">
                        <h2 class="mt-0 mb-3 header-title">Novo Quiz</h2>

                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Link Fiscallize</label>
                                <div class="col-sm-5">
                                    <input type="text" name="link_fiscallize" id="link_fiscallize" placeholder="Link Fiscalizze" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Nome prova</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nome_avaliacao" id="nome_avaliacao" placeholder="Nome da prova" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Data prova</label>
                                <div class="col-sm-3">
                                    <input type="datetime-local" name="data_avaliacao" id="data_avaliacao" placeholder="Data da prova" class="form-control">
                                    </d1iv>

                                </div>

                                <label for="inputPassword3" class="col-sm-2 col-form-label">Liberado</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="liberado" id="">
                                        <option value="liberado">Liberado</option>
                                        <option value="bloqueado">Não Liberado</option>
                                    </select>

                                </div>
                            </div>



                            <!-- Accordion Using List Group -->
                            <div class="form-group mb-0  mt-5 justify-content-end row">
                                <div class="col-sm-10">
                                    <button type="submit" name="cadastrar"
                                        class="btn btn-success waves-effect waves-light">Salvar</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php';?>

</div>

</div>

<style>
    .list-group-item {
        padding: 5px 10px
    }
</style>
<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- Plugins Js -->
<script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/libs/switchery/switchery.min.js"></script>
<script src="assets/libs/multiselect/jquery.multi-select.js"></script>
<script src="assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script>

<script src="assets/libs/select2/select2.min.js"></script>
<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
<script src="assets/libs/moment/moment.js"></script>
<script src="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- Init js-->
<script src="assets/js/pages/form-advanced.init.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>
</body>

</html>