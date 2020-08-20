<template>
  <div class="app-container">
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="130px">
      <el-form-item label="Store name" prop="name">
        <el-input v-model="ruleForm.name"></el-input>
      </el-form-item>
      <el-form-item label="Type store" prop="type">
        <el-select v-model="ruleForm.type" placeholder="Please select type store"> 
          <el-option
            v-for="(item, index) in types"
            :key="index"
            :value="item.value"
            :label="item.label"
          ></el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="Store owner" prop="owner">
        <el-input v-model="ruleForm.owner"></el-input>
      </el-form-item>
      <el-form-item label="Email" prop="email">
        <el-input v-model="ruleForm.email"></el-input>
      </el-form-item>
      <el-form-item label="Address" prop="address">
        <el-input v-model="ruleForm.address"></el-input>
      </el-form-item>
      <el-form-item v-if="ruleForm.type != undefined" label="Choose Product" label-width="130px">
        <el-table
          ref="multipleTable"
          :data="tableData"
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
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="submitForm('ruleForm')">Create</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      types: [
        { value: 1, label: "Canndy" },
        { value: 2, label: "Toy" }
      ],
      ruleForm: {
        name: '',
        type: undefined,
        owner: '',
        email: '',
        address: '',
      },
      rules: {
        name: [
          { required: true, message: 'Please input Store name', trigger: 'blur' },
          { min: 3, max: 20, message: 'Length should be 3 to 20', trigger: 'blur' }
        ],
        type: [
          { required: true, message: 'Please select Type store', trigger: 'change' }
        ],
        owner: [
          { required: true, message: 'Please input store Owner', trigger: 'blur' }
        ],
        email: [
          { required: true, message: 'Please input email address', trigger: 'blur' },
          { type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change'] }
        ],
        address: [
          { required: true, message: 'Please input Address', trigger: 'blur' }
        ]
      },
      multipleSelection: [],
      tableData: [
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
    };
  },
  methods: {
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          this.$message({
          message: 'Congrats! You have successfully created your store',
          type: 'success'
        });
        } else {
          this.$message({
            message: 'Warning! You have not completed the required information',
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