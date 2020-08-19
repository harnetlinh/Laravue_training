<template>
  <div class="app-container">
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px">
      <el-form-item label="Product name" prop="name" label-width="120px">
        <el-input v-model="ruleForm.name"></el-input>
      </el-form-item>
      <el-form-item label="Type product" prop="type" label-width="120px">
        <el-select v-model="ruleForm.type" placeholder="Please select type product"> 
          <el-option
            v-for="(item, index) in types"
            :key="index"
            :value="item.value"
            :label="item.label"
          ></el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="Made in" prop="made" label-width="120px">
        <el-input v-model="ruleForm.made"></el-input>
      </el-form-item>
      <el-form-item  v-if="this.ruleForm.type == 1" label="Sugar" label-width="120px">
          <el-input-number v-model="ruleForm.Sugar" controls-position="right" :min="0" :max="100"></el-input-number>
      </el-form-item>
      <el-form-item  v-if="this.ruleForm.type == 2" label="Material" label-width="120px">
        <el-input v-model="ruleForm.material"></el-input>
      </el-form-item>
      <el-form-item label="Brand" prop="brand" label-width="120px">
        <el-input v-model="ruleForm.brand"></el-input>
      </el-form-item>
      <el-form-item label="Price" prop="price" label-width="120px">
        <el-input-number v-model="ruleForm.price" controls-position="right" :min="1"></el-input-number>
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
        type: '',
        made: '',
        sugar: '',
        material: '',
        brand: '',
        price: ''
      },
      rules: {
        name: [
          { required: true, message: 'Please input Product name', trigger: 'blur' },
          { min: 3, max: 20, message: 'Length should be 3 to 20', trigger: 'blur' }
        ],
        type: [
          { required: true, message: 'Please select Type product', trigger: 'change' }
        ],
        made: [
          { required: true, message: 'Please input Made', trigger: 'blur' }
        ],
        brand: [
          { required: true, message: 'Please input Brand', trigger: 'blur' }
        ]
      },
    };
  },
  methods: {
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          this.$message({
          message: 'Congrats! You have successfully created Product',
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
  }
}
</script>

<style>

</style>