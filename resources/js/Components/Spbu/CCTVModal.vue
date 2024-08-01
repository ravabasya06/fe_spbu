<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="cctvpopup"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">CCTV</h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <iframe
            src="https://giphy.com/embed/l0MYAs5E2oIDCq9So"
            width="480"
            height="298"
            style=""
            frameBorder="0"
            class="giphy-embed"
            allowFullScreen
          ></iframe>
          <p>
            <a href="https://giphy.com/gifs/spongebob-l0MYAs5E2oIDCq9So"></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.modal-header {
  background-color: #c32130;
}

.btn-close:focus {
  outline: none; /* Remove focus outline */
  box-shadow: none; /* Remove box-shadow on focus */
}

.modal-content {
  background-color: rgb(255, 255, 255);
  color: rgb(255, 255, 255);
}

.modal-body h2 {
  color: black;
  font-size: 25px;
}

.modal-body p {
  color: black;
  font-size: 15px;
}
</style>
