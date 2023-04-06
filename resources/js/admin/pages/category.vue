<template>
    <div>
        <main id="main" class="main">
            <section class="section dashboard">
                <div class="row">
                    <!-- Left side columns -->
                    <div class="col-12">
                        <div class="row">
                            <!-- Recent Sales -->
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Category |
                                            <button
                                                type="button"
                                                class="btn btn-secondary btn-sm"
                                                data-toggle="modal"
                                                data-target="#exampleModal"
                                            >
                                                <i class="bi bi-node-plus"></i>
                                                Add category
                                            </button>
                                        </h5>

                                       
                                        <!-- Table -->
                                        <table
                                            class="table table-borderless datatable"
                                        >
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">
                                                        Category name
                                                    </th>
                                                    <th scope="col">
                                                        Category image
                                                    </th>
                                                    <th scope="col">
                                                        Created at
                                                    </th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(cat, i) in category"
                                                    :key="i"
                                                    v-if="category.length"
                                                >
                                                    <th scope="row">
                                                        <a href="#">{{
                                                            cat.id
                                                        }}</a>
                                                    </th>
                                                    <td>
                                                        {{ cat.categoryName }}
                                                    </td>
                                                    <td>
                                                        <img
                                                            style="width: 7rem"
                                                            :src="cat.iconImage"
                                                            alt=""
                                                            srcset=""
                                                        />
                                                    </td>
                                                    <td>
                                                        {{ cat.created_at }}
                                                    </td>
                                                    <td>
                                                        <button
                                                            type="button"
                                                            class="btn btn-primary btn-sm mx-1"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal1"
                                                            @click="
                                                                showEditTag(cat)
                                                            "
                                                        >
                                                            Edit
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-danger btn-sm"
                                                            @click="
                                                                deleteTag(cat)
                                                            "
                                                        >
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End Recent Sales -->
                        </div>
                    </div>
                    <!-- End Left side columns -->
                </div>
            </section>

            <!-- edit model -->
            <div
                class="modal fade"
                id="exampleModal1"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Edit category?
                            </h5>
                        </div>
                        <div class="modal-body">
                            <!-- <input
                                v-model="data.tagName"
                                type="text"
                                placeholder="Type category title"
                            /> -->

                            <Input
                                v-model="editdata.categoryName"
                                placeholder="Enter category name"
                                clearable
                                style="width: 200px"
                                class="my-3"
                            />
                            <Upload
                                v-show="newUpload"
                                multiple
                                type="drag"
                                v-model="editdata.iconImage"
                                action="/upload"
                                :format="['jpeg', 'png', 'jpg']"
                                :on-format-error="handleFormatError"
                                :on-success="handleSuccess"
                                :max-size="3048"
                                :on-exceeded-size="handleMaxSize"
                                :on-error="handleError"
                            >
                                <div style="padding: 20px 0">
                                    <Icon
                                        type="ios-cloud-upload"
                                        size="52"
                                        style="color: #3399ff"
                                    ></Icon>
                                    <p>Click or drag files here to upload</p>
                                </div>
                            </Upload>
                            <div class="flex">
                                <img
                                    :src="`${editdata.iconImage}`"
                                    alt=""
                                    class="img-thumbnail container-fluid"
                                    style="width: 25rem; cursor: pointer"
                                />

                                <lord-icon
                                    v-show="toggle_delete"
                                    src="https://cdn.lordicon.com/kfzfxczd.json"
                                    trigger="hover"
                                    style="width: 29px;height: 29px;padding-top: 0.5rem;color: crimson;"
                                    
                                    @click="deleteImg()"
                                >
                                    Delete
                                </lord-icon>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>

                            <button
                                type="button"
                                class="btn btn-primary"
                                id="liveToastBtn"
                                @click="editCategory()"
                                :disabled="isAdding"
                                :loading="isAdding"
                                data-dismiss="modal"
                            >
                                {{ isAdding ? "Editting...." : "Edit" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- add model -->
            <div
                class="modal fade"
                id="exampleModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Add category?
                            </h5>
                        </div>
                        <div class="modal-body">
                            <!-- <input
                                v-model="data.tagName"
                                type="text"
                                placeholder="Type category title"
                            /> -->

                            <Input
                                v-model="data.categoryName"
                                placeholder="Enter category name"
                                clearable
                                style="width: 200px"
                                class="my-3"
                            />
                            <Upload
                                multiple
                                type="drag"
                                v-model="data.iconImage"
                                action="/upload"
                                :format="['jpeg', 'png', 'jpg']"
                                :on-format-error="handleFormatError"
                                :on-success="handleSuccess"
                                :max-size="3048"
                                :on-exceeded-size="handleMaxSize"
                                :on-error="handleError"
                            >
                                <div style="padding: 20px 0">
                                    <Icon
                                        type="ios-cloud-upload"
                                        size="52"
                                        style="color: #3399ff"
                                    ></Icon>
                                    <p>Click or drag files here to upload</p>
                                </div>
                            </Upload>

                            <img
                                :src="`${data.iconImage}`"
                                alt=""
                                class="img-thumbnail container-fluid"
                                style="width: 25rem"
                            />
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>

                            <button
                                type="button"
                                class="btn btn-primary"
                                id="liveToastBtn"
                                @click="addCategory"
                                :disabled="isAdding"
                                :loading="isAdding"
                                data-dismiss="modal"
                            >
                                {{ isAdding ? "Adding...." : "Save" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data: {
                iconImage: "",
                categoryName: "",
            },
            editdata: {
                iconImage: "",
                categoryName: "",
            },
            category: [],
            isAdding: false,
            preview: false,
            model: false,
            newUpload: false,
            toggle_delete: true,
        };
    },

    methods: {
        async addCategory() {
            this.isAdding = true;
            if (this.data.categoryName.trim() == "") {
                this.isAdding = false;
                return this.w("Please fill up the form!");
            }
            if (this.data.iconImage.trim() == "") {
                this.isAdding = false;
                return this.w("Please include image!");
            }
            this.data.iconImage = `${this.data.iconImage}`;
            const res = await this.callApi("post", "/add_category", this.data);
            this.isAdding = false;

            if (res.status == 201) {
                this.category.unshift(res.data);
                this.s("Category created successfully!");
                this.data.iconImage = "";
                this.data.categoryName = "";

                console.log("creadted");
            } else {
                if (res.status == 500) {
                    this.e("Something went wrong!");
                    this.isAdding = false;
                }
            }
        },

        async deleteImg() {
            let image = this.editdata.iconImage;

            const res = await this.callApi("post", "/delete_image", image);

            if (res.status == 200) {
                this.s("Image deleted!");
                this.editdata.iconImage = "";
                this.newUpload = true;
                this.toggle_delete = false;
            } else {
                this.data.iconImage = image;
                this.e("image failed to delete!");
                this.newUpload = false;
            }

            /* this.isAdding = false; */
        },

        async editCategory() {
            const res = await this.callApi(
                "post",
                "/edit_category",
                this.editdata
            );

            if (res.status == 200) {
                this.s("Category editted successfully!");
              
                this.newUpload = false;
                this.toggle_delete = true;
            } else {
                this.e("Categoryfailed to edit!");
            }
        },
        showEditTag(cat) {
            this.editdata = cat;
            this.closeModal = true;
        },

        /* form validations */
        handleSuccess(res, file) {
            res = `uploads/${res}`;
            this.editdata.iconImage = res;
        },
        handleError(res, file) {
            console.log(res);
            console.log(file);
        },
        handleFormatError(file) {
            this.e("File format not supported!");
        },
        handleMaxSize(file) {
            this.e("Exceeding file size!");
        },

        handleShowPreview() {
            this.preview = true;
        },
    },

    async created() {
        const res = await this.callApi("get", "/get_category");
        if (res.status == 200) {
            this.category = res.data;
        } else {
            console.log("error in fetching  tags");
        }
    },
};
</script>
