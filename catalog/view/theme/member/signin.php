<section class="py-5 mb-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="signin p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo route('member/signin'); ?>" method="POST">
                            <label for="">อีเมล</label>
                            <input type="text" class="form-control mb-3" name="user" value="test01">
                            <label for="">รหัสผ่าน</label>
                            <input type="password" class="form-control mb-3" name="pass" value="test01">
                            <button class="btn btn-theme" type="submit">เข้าสู่ระบบ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>