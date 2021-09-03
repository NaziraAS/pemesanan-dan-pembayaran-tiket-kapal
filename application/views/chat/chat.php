<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?= form_error('chat', '<div class="alert alert-danger">', '</div>'); ?>
        </div>
    </div>
    <form action="<?= base_url('Chat') ?>" method="post">
        <input type="hidden" class="form-control" id="id" value="<?= $id['id'] ?>">
        <h1 class="text-center">chat</h1>
        <div class="row justify-content-center my-auto">
            <div class="col-md-6 border">
                <div class="row">
                    <div class="col-md" id="content">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <input type="text" class="form-control" value="tes">
                            </div>
                        </div>
                        <!-- content generate dengan ajax -->
                        <!-- <div class="row justify-content-end">
                    <div class="col-md-6 mt-3">
                        <input type="text" class="form-control" id="message" value="tes">
                    </div>
                </div> -->
                        <!-- content generate dengan ajax -->
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="message">
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-dark send">
                            <span><i class="far fa-paper-plane"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- <script>
    let message = document.getElementById('message');
    let send = document.getElementById('send');
    send.addEventListener('click', function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        }
        xhr.open('post', 'http://localhost/tiket-kapal/Chat/tes/' + message.value, true);
        xhr.send();
        message.value = "";

    });
</script> -->