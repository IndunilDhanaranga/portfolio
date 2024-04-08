<div class="row">
    <div class="col-md-3">
        <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new" target="blank"
            class="btn btn-primary btn-block mb-3">Compose</a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Folders</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item ">
                        <a href="#" class="nav-link active" onclick="readStatus(null,this)">
                            <i class="fas fa-inbox"></i> All Message
                            <span class="badge bg-warning float-right" id="inbox_count">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="readStatus(0,this)">
                            <i class="far fa-envelope"></i> Unread
                            <span class="badge bg-danger float-right" id="unreaded_count">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="readStatus(1,this)">
                            <i class="far fa-file-alt"></i> Read
                            <span class="badge bg-success float-right" id="readed_count">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9" id="mail_list">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Mail" id="search_email">
                        <div class="input-group-append">
                            <div class="btn btn-primary" onclick="searchMail()">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body p-0">
                <div class="mailbox-controls">
                    <button type="button" class="btn btn-default btn-sm" onclick="refreshMessage()">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody id="message_tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9" id="mail_view_div">

    </div>
</div>
