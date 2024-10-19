<section id="contact">
  <div class="container-lg">

    <div class="bg-secondary text-light py-5 my-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5 p-3">
            <div class="section-header">
              <h2 class="section-title display-5 text-light">Liên hệ với chúng tôi</h2>
            </div>
            <p>Điền tên và số điện thoại, lời nhắn để nhận được sự tư vấn cụ thể</p>
          </div>
          <div class="col-md-5 p-3">
            <form action="index.php?controller=home&action=createContact" method="post">
              <div class="mb-3">
                <label for="contactName" class="form-label d-none">Họ tên</label>
                <input type="text"
                  class="form-control form-control-md rounded-0" name="contactName" id="contactName" placeholder="Họ tên">
              </div>
              <div class="mb-3">
                <label for="contactPhone" class="form-label d-none">Số điện thoại</label>
                <input type="number" class="form-control form-control-md rounded-0" name="contactPhone" id="contactPhone" placeholder="Nhập số điện thoại">
              </div>
              <div class="mb-3">
                <label for="contactMessage" class="form-label d-none">Tin nhắn</label>
                <textarea
                  class="form-control form-control-md rounded-0"
                  name="contactMessage"
                  id="contactMessage"
                  placeholder="Nhập tin nhắn tại đây"
                ></textarea>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark btn-md rounded-0">Gửi</button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </div>

  </div>
</section>