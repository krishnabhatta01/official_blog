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
                                            Tags |
                                            <button
                                                type="button"
                                                class="btn btn-secondary btn-sm"
                                                data-toggle="modal"
                                                data-target="#exampleModal"
                                            >
                                                <i class="bi bi-node-plus"></i>
                                                Add tags
                                            </button>
                                        </h5>

                                        <!-- message -->
                                        <!-- <div
                                            class="alert alert-success alert-dismissible fade show"
                                            role="alert"
                                        >
                                            <i
                                                class="bi bi-check-circle me-1"
                                            ></i>
                                            {{ data.msg }}
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="alert"
                                                aria-label="Close"
                                            ></button>
                                        </div> -->
                                        <span v-if="errors">
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Maximum limit exceed!</strong> <br>Please enter tag within 10 letters.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </span>
                                        <span v-if="createdAlert">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Tag created!</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </span>
                                        <span v-if="delete_msg">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Tag deleted!</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </span>
                                        <!-- Table -->
                                        <table
                                            class="table table-borderless datatable"
                                        >
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">
                                                        Tag name
                                                    </th>
                                                    <th scope="col">
                                                        Created at
                                                    </th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(tag, i) in tags"
                                                    :key="i"
                                                    v-if="tags.length"
                                                >
                                                    <th scope="row">
                                                        <a href="#">{{
                                                            tag.id
                                                        }}</a>
                                                    </th>
                                                    <td>{{ tag.tagName }}</td>
                                                    <td>
                                                        {{ tag.created_at }}
                                                    </td>
                                                    <td>
                                                        <button
                                                            type="button"
                                                            class="btn btn-primary btn-sm mx-1"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal1"
                                                            @click="showEditTag(tag)"
                                                        >
                                                            Edit
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-danger btn-sm"
                                                              @click="deleteTag(tag)"
                                                              :loading="tag.isDeleting"
                                                             
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
                                Edit tags?
                            </h5>
                        </div>
                        <div class="modal-body">
                            <input v-model="editdata.tagName" type="text" />
                        </div>
                        <div class="modal-footer">
                            <!-- <button
                                type="button"
                                class="btn btn-secondary"
                                
                                @click="closeModal=true"
                            >
                            Close -->
                            <div v-if="closeModal" >
                            <button data-dismiss="modal"   type="button"
                                class="btn btn-secondary">Close</button>
                            </div>
                            <!-- </button> -->
                            <button
                                type="button"
                                class="btn btn-primary"
                                id="liveToastBtn"
                                @click="editTag"
                                :disabled="isAdding"
                                :loading="isAdding"
                                data-dismiss="modal"
                            >
                                {{ isAdding ? "Editting...." : "Save" }}
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
                                Add tags?
                            </h5>
                        </div>
                        <div class="modal-body">
                            <input v-model="data.tagName" type="text" />
                        </div>
                        <div class="modal-footer">
                             <div v-if="closeModal" >
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            </div>
                            <button
                                type="button"
                                class="btn btn-primary"
                                id="liveToastBtn"
                                @click="addTag"
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
                tagName: "",
            },
            editdata: {
                tagName: "",
            },
            tags: [],
            isAdding: false,
            
           
            closeModal: false,

            model: false,
            errors: false,
            createdAlert: false,
            delete_msg:false,
        };
    },

    methods: {
        async addTag() {
            this.isAdding = true;
            if (this.data.tagName.trim() == "") {
                return this.w("warning");
            }

            const res = await this.callApi(
                "post",
                "/app/create_tag",
                this.data
            );
            this.isAdding = false;
            
            if (res.status == 201) {
                this.tags.unshift(res.data);
                /* this.s("Tag created successfully!"); */
                this.createdAlert = true;
                this.data.tagName = "";
               
                 setTimeout(() => {
                        this.hide()
                    },3000)
                console.log("creadted");
            } else {
                if (res.status == 422) {
                    /*  this.errors = error.response.data.errors;*/
                    this.errors = true;
                     this.data.tagName = "";
                    setTimeout(() => {
                        this.hide()
                    },3000)
                }
            }
        },
        hide() {
                this.errors = false
                this.createdAlert = false
                this.delete_msg = false
            },

        async deleteTag(tag) {
            /* this.$set(tag, 'isDeleting', true); */

            if (confirm('Do you want to delete the tag?')) {
                const res = await this.callApi("post", '/app/delete_tag', tag);
                if (res.status == 200) {
                    this.delete_msg = true;
                    this.tags.splice(tag, 1);
                    setTimeout(() => {
                        this.hide()
                    }, 3000)
                    console.log('tag deleted');
                } else {
                    console.log('tag failed to delete');
                }
            }
            /* this.isAdding = false; */
        },

        async editTag() {
           
            
            const res = await this.callApi(
                "post",
                "/app/edit_tag",
                this.editdata
            );

            if (res.status == 200) {
        
                console.log("creadted");
            } else {
                console.log('error edditing tag');
            }
        },
        showEditTag(tag) {
            this.editdata = tag;
            this.closeModal= true;
        }
    },

    async created() {
        const res = await this.callApi("get", "/app/get_tag");
        if (res.status == 200) {
            this.tags = res.data;
        } else {
            console.log("error in fetching  tags");
        }
    },
};
</script>
