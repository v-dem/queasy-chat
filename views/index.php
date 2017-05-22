<?php $this->load('includes.header') ?>

<div class="col-md-3">
    <div class="list-group">
        <a href="#" class="list-group-item justify-content-between active">
            Guest Room
            <span class="badge badge-default badge-pill">14</span>
        </a>
        <a href="#" class="list-group-item justify-content-between list-group-item-action">PHP 7 Discussions</a>
        <a href="#" class="list-group-item justify-content-between list-group-item-action">CSS tricks</a>
        <a href="#" class="list-group-item justify-content-between list-group-item-action">Talks</a>
        <a href="#" class="list-group-item justify-content-between list-group-item-action disabled">Secret room</a>
    </div>
</div>

<div class="col-md-9 qc-no-col-padding qc-md-top-padding">
    <div class="card">
        <div class="card-header">Guest Room</div>

        <div id="chatWindow" class="card-block">
            <form id="chatForm" class="form" method="POST">
                <div class="row">
                    <div class="col-sm-10">
                        <input type="text" name="text" class="form-control" required="required" placeholder="Enter your message" />
                    </div>

                    <div class="col-sm-2 qc-no-col-padding">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load('includes.footer') ?>

