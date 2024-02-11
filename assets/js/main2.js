const post_form = document.getElementById('post_add_hive_form');
const msg = document.querySelector('.msg');
const all_posts = document.querySelector('.all-post');
const edit_post = document.getElementById('edit_post');
const comment_user = document.getElementById('comment-user');



post_form.onsubmit = (e) => {
    e.preventDefault();

    const form_data = new FormData(e.target);
    const data = Object.fromEntries(form_data.entries());
    const { eauthor, etitle, econtent } = Object.fromEntries(form_data.entries());
    if (!eauthor || !etitle || !econtent) {
        msg.innerHTML = setAlert('Fields Are Required!');
    } else {

        const id = Math.floor(Math.random() * 1000) + '_' + Date.now();
        const dataObj = { ...data, id }

        createLSData('ins_post', dataObj);
        e.target.reset();
        getAllPosts();
    }

}


const getAllPosts = () => {
    let post = getLSData('ins_post');
    let list = '';



    if (!post) {
        all_posts.innerHTML = <div class="card shadow-sm text-center mt-3"><div class="card-body">No post found</div></div>;
        return false;
    }

    if (post) {

        post.reverse().map((item) => {
            list += ` 
            <div>
            <p class="username">${item.eauthor}</p>
            </div>

            <div>
            <p class="username">${item.etitle}</p>
            </div>  

            <div>
            <p class="username">${item.econtent}</p>
            </div>
            
        
                `;
        });

    }
    all_posts.innerHTML = list;

}
getAllPosts();

// classList.contains

// Post Edit 

all_posts.onclick = (e) => {
    // console.log(e.target.hasAttribute('editlsdata'));

    if (e.target.hasAttribute('editlsdata')) {
        const id = e.target.getAttribute('editLsData');
        const data = getLSData('ins_post');
        // const { aname, aphoto, pcontent, pdate, pphoto } = data[index];
        const singleData = data.find(item => item.id == id);


        edit_post.innerHTML = `
        <div class="my-3">
                            <label for="">Author Name</label>
                            <input name="aname" type="text" value="${singleData.aname}" class="form-control">
                            <input name="id" value="${singleData.id}" type="hidden" />
                        </div>
                        <div class="my-3">
                            <label for="">Author Profile Photo</label>
                            <input name="aphoto" type="text" value="${singleData.aphoto}" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="">Post Content</label>
                            <textarea name="pcontent" class="form-control" placeholder="Write a caption...">${singleData.pcontent}</textarea>
                        </div>
                        <div class="my-3">
                            <label for="">Post Photo</label>
                            <input name="pphoto" type="text" value="${singleData.pphoto}" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="">Please Mention Your Post Date</label>
                            <input name="pdate" type="date" value="${singleData.pdate}" class="form-control">
                        </div>
                        <div class="my-3">
                            <!-- <button type="button" class="btn btn-primary w-100">Create Post</button> -->
                            <input type="submit" class="btn btn-primary w-100" value="Update Post">
                        </div>
        `;
        console.log(id);

    }

    if (e.target.hasAttribute('deleteLsData')) {
        const id = e.target.getAttribute('deleteLsData');

        if (confirm('Are Your Sure? You want to delete this post?') == true) {
            const ddelete = getLSData('ins_post');
            const index = ddelete.findIndex(item => item.id == id);
            console.log(ddelete)

            ddelete.splice(index, 1);
            updateLSData('ins_post', ddelete);
            getAllPosts();


        }
    }
}


edit_post.onsubmit = (e) => {
    e.preventDefault();

    const form_data = new FormData(e.target);
    const { aname, pcontent, id } = Object.fromEntries(form_data.entries());
    const post = getLSData('ins_post');
    const index = post.findIndex(item => item.id == id);
    post[index] = { aname, pcontent, id };


    updateLSData('ins_post', post);
    getAllPosts();

}