<!-- <template>
  <div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" >Danh sách dịch vụ</h4>
              <router-link class="nav-link" :to="{name:'addService'}">
                <vs-button type="gradient" style="float:right;">Thêm mới</vs-button>
              </router-link>
              <vs-input icon="search" placeholder="Search" v-model="keyword" @keyup="searchBlog" />
              <vs-table stripe :data="list" max-items="10" pagination>
                <template slot="thead">
                  <vs-th>Ảnh</vs-th>
                  <vs-th>Tên</vs-th>
                  <vs-th>Hành động</vs-th>
                </template>
                <template slot-scope="{data}">
                  <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                    <vs-td :data="tr.id">
                      <vs-avatar size="70px" :src="tr.image" />
                    </vs-td>
                    <vs-td :data="tr.name">{{tr.name}}</vs-td>
                    <vs-td >
                      <router-link :to="{name:'editService',params:{id:tr.id}}">
                        <vs-button
                          vs-type="gradient"
                          size="lagre"
                          color="success"
                          icon="edit"
                        ></vs-button>
                      </router-link>
                      <vs-button vs-type="gradient" size="lagre" color="red" icon="delete_forever" @click="confirmDestroy(tr.id)"></vs-button>
                    </vs-td>
                  </vs-tr>
                </template>
              </vs-table>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>


<script>
import Swal from "sweetalert2";
import { mapActions } from "vuex";
export default {
  data() {
    return {
      list:[],
      keyword:"",
      id_item:"",
    };
  },
  components: {},
  computed: {},
  watch: {},
  methods: {
    ...mapActions(['listService','loadings','deleteService']),
    listServices(){
      this.listService({ keyword: this.keyword })
      .then(response => {
          this.loadings(false);
          this.list = response.data;
      }).catch(err => {
          this.loadings(false);
          this.list = err.data;
      });
    },
    confirmDestroy(id){
      this.id_item = id
      this.$vs.dialog({
        type:'confirm',
        color: 'danger',
        title: `Bạn có chắc chắn`,
        text: 'Xóa bản tin này',
        accept:this.destroy
      })
    },
    searchBlog() {
      if (this.timer) {
        clearTimeout(this.timer);
        this.timer = null;
      }
      this.timer = setTimeout(() => {
          this.listService({ keyword: this.keyword })
          .then(response => {
              this.list = response.data;
          }).catch(err => {
              this.list = err.data;
          });
      }, 800);
    },
    destroy(){
      this.deleteService({id:this.id_item}).then(response => {
        this.listServices();
        this.loadings(false);
        this.$success('xóa thành công');
      });
    }
  },
  mounted() {
    this.listServices();
  }
};
</script> -->
<template>
  <div class="welcome-admin">
    <div class="welcome-container">
      <h1 class="welcome-title">Welcome Admin</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "WelcomeAdmin"
};
</script>

<style scoped>
.welcome-admin {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 60vh;
}

.welcome-container {
  text-align: center;
}

.welcome-title {
  font-size: 3rem;
  font-weight: 600;
  color: #333;
  margin: 0;
}
</style>