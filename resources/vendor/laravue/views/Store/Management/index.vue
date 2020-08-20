<template>
  <div class="app-container">
    <el-table
      :data="tableData"
      style="width: 100%">
      <el-table-column
        label="Store Name">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.StoreName }}</span>
        </template>
      </el-table-column>
      <el-table-column
        label="Store Type">
        <template slot-scope="scope">
          <span v-if="scope.row.TypeStore == 1" style="margin-left: 10px">Canndy</span>
          <span v-if="scope.row.TypeStore == 2" style="margin-left: 10px">Toy</span>
        </template>
      </el-table-column>
      <el-table-column
        label="Time Create">
        <template slot-scope="scope">
          <i class="el-icon-time"></i>
          <span style="margin-left: 10px">{{ scope.row.TimeCreate }}</span>
        </template>
      </el-table-column>
      <el-table-column
        label="Owner">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.Owner}}</span>
        </template>
      </el-table-column>
      <el-table-column
        label="Status">
        <template slot-scope="scope">
          <el-tag v-if="scope.row.Status == true" :type="scope.row.Status | statusFilter" size="medium">Show</el-tag>
          <el-tag v-else :type="scope.row.Status | statusFilter" size="medium">Hidden</el-tag>
        </template>
      </el-table-column>
      <el-table-column
        label="Creator">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.Creator }}</span>
        </template>
      </el-table-column>
      <el-table-column
        width="500"
        label="Operations">
        <template slot-scope="{row}">
          <el-button
            size="mini"
            @click="handleAddProduct(row)">Add Product</el-button>
          <el-button
            size="mini"
            @click="handleDeleteProduct(row)">Delete Product</el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleEditStore(row)">Edit Store</el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleDeleteStore(row)">Delete Store</el-button>
        </template>
      </el-table-column>
    </el-table>

    <el-dialog :visible.sync="dialogAddProductVisible" title="Add Product for Store">
      <el-table
        ref="multipleTable"
        :data="tableAdd"
        style="width: 100%"
        @selection-change="handleSelectionChange">
        <el-table-column
          type="selection"
          width="55">
        </el-table-column>
        <el-table-column
          label="Product Name">
          <template slot-scope="scope">{{ scope.row.ProductName }}</template>
        </el-table-column>
        <el-table-column
          label="Made in">
          <template slot-scope="scope">{{ scope.row.Madein }}</template>
        </el-table-column>
        <el-table-column
          label="Brand">
          <template slot-scope="scope">{{ scope.row.Brand }}</template>
        </el-table-column>
        <el-table-column
          label="Price">
          <template slot-scope="scope">{{ scope.row.Price }}</template>
        </el-table-column>
      </el-table>
      <div class="footer">
        <el-button @click="dialogAddProductVisible = false">Cannel</el-button>
        <el-button type="primary" @click="addProduct()">Confirm</el-button>
      </div>
    </el-dialog>

    <el-dialog :visible.sync="dialogDeleteProductVisible" title="Delete Product in Store">
      <el-table
        ref="multipleTable"
        :data="tableDelete"
        style="width: 100%"
        @selection-change="handleSelectionChange">
        <el-table-column
          type="selection"
          width="55">
        </el-table-column>
        <el-table-column
          label="Product Name">
          <template slot-scope="scope">{{ scope.row.ProductName }}</template>
        </el-table-column>
        <el-table-column
          label="Made in">
          <template slot-scope="scope">{{ scope.row.Madein }}</template>
        </el-table-column>
        <el-table-column
          label="Brand">
          <template slot-scope="scope">{{ scope.row.Brand }}</template>
        </el-table-column>
        <el-table-column
          label="Price">
          <template slot-scope="scope">{{ scope.row.Price }}</template>
        </el-table-column>
      </el-table>
      <div class="footer">
        <el-button @click="dialogDeleteProductVisible = false">Cannel</el-button>
        <el-button type="primary" @click="deleteProduct()">Delete</el-button>
      </div>
    </el-dialog>

    <el-dialog :visible.sync="dialogFormVisible" title="Edit">
      <el-form ref="dataForm" :rules="rules" :model="temp" label-position="left" style="width: 400px; margin-left:50px;">
        <el-form-item label="Store Name" prop="StoreName" label-width="120px" required>
          <el-input v-model="temp.StoreName"/>
        </el-form-item>
        <el-form-item label="Time Create" label-width="120px">
          <el-date-picker v-model="temp.TimeCreate" type="date" placeholder="Please pick a date" :disabled="true"/>
        </el-form-item>
        <el-form-item label="Owner" label-width="120px">
          <el-input v-model="temp.Owner" :disabled="true"/>
        </el-form-item>
        <el-form-item label="Creator" label-width="120px">
          <el-input v-model="temp.Creator" :disabled="true"/>
        </el-form-item>
        <el-form-item label="Status" label-width="120px">
          <el-switch v-model="temp.Status"></el-switch>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">
         Cannel
        </el-button>
        <el-button type="primary" @click="submitForm('dataForm')">
          Confirm
        </el-button>
      </div>
    </el-dialog>
  </div>
</template>

<script>
export default {
  filters: {
    statusFilter(Status) {
      const statusMap = {
        true: 'success',
        false: 'gray',
      };
      return statusMap[Status];
    },
  },
  data() {
    return {
      tableData: [
        {
          id: 1,
          TypeStore: 1,
          StoreName: 'ABC Store',
          TimeCreate: '02/08/2017',
          Owner: 'Tom',
          Status: true,
          Creator: 'Mr.John'
        },
        {
          id: 2,
          TypeStore: 1,
          StoreName: 'Apple Store',
          TimeCreate: '01/08/2010',
          Owner: 'Jerry',
          Status: true,
          Creator: 'Mr.Preter'
        },
        {
          id: 3,
          TypeStore: 2,
          StoreName: 'Banna Store',
          TimeCreate: '08/08/2020',
          Owner: 'Cat',
          Status: false,
          Creator: 'Mr.Alex'
        },
        {
          id: 4,
          TypeStore: 1,
          StoreName: 'Viet Nam Store',
          TimeCreate: '02/08/2020',
          Owner: 'Dog',
          Status: true,
          Creator: 'Mr.Bean'
        }
      ],
      temp: {
        id: undefined,
        TypeProduct: undefined,
        StoreName: '',
        TimeCreate: '',
        Owner: '',
        Creator: ''
      },
      dialogFormVisible: false,
      dialogAddProductVisible: false,
      dialogDeleteProductVisible: false,
      rules: {
        
      },
      multipleSelection: [],
      tableAdd: [
        {
          id: 1,
          TypeProduct: 1,
          ProductName: 'Product 1',
          Madein: 'Viet Nam',
          Suggar: 50,
          Brand: 'Company A',
          Price: 5000
        },
        {
          id: 2,
          TypeProduct: 1,
          ProductName: 'Product 2',
          Madein: 'Viet Nam',
          Suggar: 50,
          Brand: 'Company A',
          Price: 5000
        }
      ],
      tableDelete: [
        {
          id: 1,
          TypeProduct: 1,
          ProductName: 'Product 1',
          Madein: 'Viet Nam',
          Suggar: 50,
          Brand: 'Company A',
          Price: 5000
        },
        {
          id: 2,
          TypeProduct: 1,
          ProductName: 'Product 2',
          Madein: 'Viet Nam',
          Suggar: 50,
          Brand: 'Company A',
          Price: 5000
        }
      ]
    }
  },
  methods: {
    handleAddProduct(row) {
      this.temp = Object.assign({}, row);
      console.log("Add Product TEMP");
      console.log("Store ID: " + this.temp.id);
      console.log("Store Type: " + this.temp.TypeStore);
      this.dialogAddProductVisible = true;
      this.$nextTick(() => {
        this.toggleSelection();
      });
    },
    addProduct() {
      console.log("Add Product SEND");
      console.log("Store ID: " + this.temp.id);
      console.log("Store Type: " + this.temp.TypeStore);
      console.log("List Product: " + this.multipleSelection);
    },
    handleDeleteProduct(row) {
      this.temp = Object.assign({}, row);
      console.log("Delete Product TEMP");
      console.log("Store ID: " + this.temp.id);
      console.log("Store Type: " + this.temp.TypeStore);
      this.dialogDeleteProductVisible = true;
      this.$nextTick(() => {
        this.toggleSelection();
      });
    },
    deleteProduct() {
      console.log("Delete Product SEND");
      console.log("Store ID: " + this.temp.id);
      console.log("Store Type: " + this.temp.TypeStore);
      console.log("List Product: " + this.multipleSelection);
    },
    handleEditStore(row) {
      this.temp = Object.assign({}, row);
      console.log("Edit Store TEMP");
      console.log("Store ID: " + this.temp.id);
      console.log("Store Type: " + this.temp.TypeStore);
      this.temp.TimeCreate = new Date(this.temp.timestamp);
      this.dialogFormVisible = true;
      this.$nextTick(() => {
        this.$refs['dataForm'].clearValidate();
      });
    },
    handleDeleteStore(row) {
      const index = this.tableData.indexOf(row);
      if(this.tableData.splice(index, 1)){
        this.$message({
          message: 'Delete successfully!',
          type: 'success'
        });
      }else{
        this.$message({
          message: 'Delete failed!',
          type: 'warning'
        });
      }
    },
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          this.$message({
          message: 'Congrats! Update successfully',
          type: 'success'
        });
        this.dialogFormVisible = false;
        } else {
          this.$message({
            message: 'Warning! Update failed',
            type: 'warning'
          });
          return false;
        }
      });
    },
    toggleSelection(rows) {
      if (rows) {
        rows.forEach(row => {
          this.$refs.multipleTable.toggleRowSelection(row);
        });
      } else {
        this.$refs.multipleTable.clearSelection();
      }
    },
    handleSelectionChange(val) {
      this.multipleSelection = [];
      for(var i = 0; i < val.length; i++) {
        this.multipleSelection.push(val[i].id);
      }
    }
  }
}
</script>

<style>

</style>

<style scoped>
.footer {
  margin-top: 20px;
  text-align: right;
}
</style>