<template>
  <div class="app-container">
    <el-table
      :data="tableDataToy"
      :default-sort = "{prop: 'name madein material'}"
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
        label="Type Product">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.typeProduct }}</span>
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
        prop="material"
        label="Material">
        <template slot-scope="scope">
          <span style="margin-left: 10px">{{ scope.row.Material }}</span>
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
      <el-form ref="dataForm" :rules="rules" :model="tempToy" label-position="left" style="width: 400px; margin-left:50px;">
        <el-form-item label="Product Name" label-width="120px">
          <el-input v-model="tempToy.productName"/>
        </el-form-item>
        <el-form-item label="Product Type" label-width="120px">
          <el-input v-model="tempToy.typeProduct"/>
        </el-form-item>
        <el-form-item label="Made in" label-width="120px">
          <el-input v-model="tempToy.Madein"/>
        </el-form-item>
        <el-form-item label="Material" label-width="120px">
          <el-input v-model="tempToy.Material"/>
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
      tableDataToy: [
        {
          id: 1,
          productName: 'May Bay Do Choi',
          typeProduct: 'Toy',
          Madein: 'Viet Nam',
          Material: 'Plastic',
        },
        {
          id: 2,
          productName: 'ABC',
          typeProduct: 'Toy',
          Madein: 'USA',
          Material: 'Woods',
        },
      ],
      tableDataCanndy: [
        {
          id: 1,
          productName: 'Keo Thien Duong',
          typeProduct: 'Canndy',
          Madein: 'Viet Nam',
          Sugar: '0',
        }
      ],
      tempToy: {
        id: undefined,
        productName: '',
        typeProduct: '',
        Madein: '',
        Material: '',
      },
      tempCanndy: [
        {
          id: null,
          productName: '',
          typeProduct: '',
          Madein: '',
          Sugar: '',
        }
      ],
      dialogFormVisible: false,
      rules: {

      }
    }
  },
  methods: {
    handleEdit(row) {
      this.tempToy = Object.assign({}, row);
      this.dialogFormVisible = true;
      this.$nextTick(() => {
        this.$refs['dataForm'].clearValidate();
      });
    },
    handleDelete(row) {
      const index = this.tableDataToy.indexOf(row);
      if(this.tableDataToy.splice(index, 1)){
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