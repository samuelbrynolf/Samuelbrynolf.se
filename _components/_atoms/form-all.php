<div class="row">
    <section class="l-container">
        <div class="l-span-A12">
            <h2 class="a-small components__title">Formelements: Toggle inline-block for inputs with <code>.inline</code>. Frontend validation by parsley.js.</h2>
            <form role="form" class="m-form" data-parsley-validate>
                <div class="form-group">
                    <label class="a-label block" for="exampleInputText">Forename</label>
                    <input type="text" class="a-inputText" id="exampleInputText" placeholder="Enter name" tabindex="1" required>
                    <!--  http://googlewebmastercentral.blogspot.se/2012/01/making-form-filling-faster-easier-and.html -->
                </div>
                <div class="form-group">
                    <label class="a-label block" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="a-inputText inline" id="exampleInputEmail1" placeholder="Enter email" tabindex="2" data-parsley-trigger="change" required>
                </div>
                <div class="form-group">
                    <label class="a-label block" for="exampleInputPassword1">Password</label>
                    <input type="password" class="a-inputText inline" id="exampleInputPassword1" placeholder="Passwords" tabindex="3" data-parsley-trigger="keyup" data-parsley-length="[6,20]" data-parsley-validation-threshold="6" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile" tabindex="4">
                    <p class="a-input-descr">Example block-level help text here.</p>
                </div>

                <textarea class="a-textarea" placeholder="A textarea" data-parsley-trigger="keyup" data-parsley-length="[20, 50]" data-parsley-validation-threshold="10"></textarea>
                <button type="submit" class="a-btn inline">Submit</button>
            </form>
        </div>
    </section>
</div>