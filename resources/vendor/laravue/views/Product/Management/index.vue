<template>
  <div class="app-container">
    <el-table
      :data="tableData"
      :default-sort = "{prop: 'name madein material typeproduct'}"
      style="width: 100%">
      <el-table-column
        sortable
        prop="name"
        label="Product Name">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.productName }}</span>
        </template>
      </el-table-column>
      <el-table-column
        sortable
        prop="typeproduct"
        label="Type Product">
        <template slot-scope="scope">
          <span style="margin-left: 10px" v-if="scope.row.typeProduct == 1"> Toy </span>
          <span style="margin-left: 10px" v-if="scope.row.typeProduct == 2"> Canndy </span>
        </template>
      </el-table-column>
      <el-table-column
        sortable
        prop="madein"
        label="Made in">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.Madein }}</span>
        </template>
      </el-table-column>
      <el-table-column
        sortable
        prop="detail"
        label="Detail">
        <template slot-scope="scope">
          <span style="margin-left: 10px" v-if="scope.row.typeProduct == 1">Material: {{ scope.row.Material }}</span>
          <span style="margin-left: 10px" v-if="scope.row.typeProduct == 2">Sugar: {{ scope.row.Sugar }}%</span>
        </template>
      </el-table-column>
      <el-table-column
        sortable
        prop="brand"
        label="Brand">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.Brand }}</span>
        </template>
      </el-table-column>
      <el-table-column
        sortable
        prop="price"
        label="Price">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.Price }}</span>
        </template>
      </el-table-column>
      <el-table-column
        label="Operations">
        <template slot-scope="{row}">
          <el-button
            size="mini"
            @click="handleEdit(row)">Edit</el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleDelete(row)">Delete</el-button>
        </template>
      </el-table-column>
    </el-table>

    <el-dialog :visible.sync="dialogFormVisible" title="Edit">
      <el-form ref="dataForm" :rules="rules" :model="temp" label-position="left" style="width: 400px; margin-left:50px;">
        <el-form-item label="Product Name" label-width="120px">
          <el-input v-model="temp.productName"/>
        </el-form-item>
        <el-form-item label="Product Type" label-width="120px">
          <el-input v-model="temp.typeProduct" :disabled="true"/>
        </el-form-item>
        <el-form-item label="Made in" label-width="120px">
          <el-input v-model="temp.Madein"/>
        </el-form-item>
        <el-form-item v-if="temp.typeProduct == 1" label="Material" label-width="120px">
          <el-input v-model="temp.Material"/>
        </el-form-item>
        <el-form-item v-if="temp.typeProduct == 2" label="Sugar" label-width="120px">
          <el-input-number v-model="temp.Sugar" controls-position="right" :min="0" :max="100"></el-input-number>
        </el-form-item>
        <el-form-item label="Brand" label-width="120px">
          <el-input v-model="temp.Brand"/>
        </el-form-item>
        <el-form-item label="Price" label-width="120px">
          <el-input-number v-model="temp.Price" controls-position="right" :min="1"></el-input-number>
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
  data() {
    return {
      tableData: [
        {
          id: 1,
          productName: 'May Bay Do Choi',
          typeProduct: 1,
          Madein: 'Viet Nam',
          Material: 'Plastic',
          Brand: 'VietNam',
          Price: 10000
        },
        {
          id: 2,
          productName: 'ABC',
          typeProduct: 1,
          Madein: 'USA',
          Material: 'Woods',
          Brand: 'HaNoi',
          Price: 500
        },
        {
          id: 2,
          productName: 'ABC',
          typeProduct: 2,
          Madein: 'USA',
          Sugar: 20,
          Brand: 'HaNoi',
          Price: 100
        },
      ],
      temp: {
        id: undefined,
        productName: '',
        typeProduct: '',
        Madein: '',
        Material: '',
        Brand: '',
        Price: null
      },
      dialogFormVisible: false,
      rules: {

      }
    }
  },
  methods: {
    handleEdit(row) {
      this.temp = Object.assign({}, row);
      this.dialogFormVisible = true;
      this.$nextTick(() => {
        this.$refs['dataForm'].clearValidate();
      });
    },
    handleDelete(row) {
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
          message: 'Congrats! You have successfully created your store',
          type: 'success'
        });
        this.dialogFormVisible = false;
        } else {
          this.$message({
            message: 'Warning! You have not completed the required information',
            type: 'warning'
          });
          return false;
        }
      });
    }
  }
}
</script>

<style>

</style>