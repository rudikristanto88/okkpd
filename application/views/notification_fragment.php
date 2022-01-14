<style>
    .alert {
        position: fixed;
        right: 30px;
        top: 30px;
        z-index: 99999;
        max-width: 400px;
        width: 100%;
        padding: 16px;
        border-radius: 8px;
        color: white;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }

    .alert-title {
        font-size: 18px;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .alert-success {
        background: #15CD72;
        color: white;
    }

    .alert-warning {
        background: #EDE04D;
        color: #444;
    }

    .alert {
        animation: alert-response 0.5s 1;
        -webkit-animation: alert-response 0.5s 1;
        animation-fill-mode: forwards;

        animation-delay: 4s;
        -webkit-animation-delay: 4s;
        /* Safari and Chrome */
        -webkit-animation-fill-mode: forwards;

    }

    @keyframes alert-response {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    @-webkit-keyframes alert-response {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }
</style>
<?php if ($this->session->flashdata('status')) {
    echo $this->session->flashdata('status');
}
?>