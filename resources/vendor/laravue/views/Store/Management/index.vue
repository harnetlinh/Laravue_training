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
          id: '1',
          StoreName: 'ABC Store',
          TimeCreate: '20/08/2017',
          Owner: 'Tom',
          Status: true,
          Creator: 'Mr.John'
        },
        {
          id: '2',
          StoreName: 'Apple Store',
          TimeCreate: '01/08/2010',
          Owner: 'Jerry',
          Status: true,
          Creator: 'Mr.Preter'
        },
        {
          id: '3',
          StoreName: 'Banna Store',
          TimeCreate: '20/08/2020',
          Owner: 'Cat',
          Status: false,
          Creator: 'Mr.Alex'
        },
        {
          id: '4',
          StoreName: 'Viet Nam Store',
          TimeCreate: '20/08/2020',
          Owner: 'Dog',
          Status: true,
          Creator: 'Mr.Bean'
        }
      ],
      temp: {
        id: undefined,
        StoreName: '',
        TimeCreate: '',
        Owner: '',
        Creator: ''
      },
      dialogFormVisible: false,
      rules: {

      }
    }
  },
  methods: {
    handleEdit(row) {
      this.temp = Object.assign({}, row);
      this.temp.TimeCreate = new Date(this.temp.timestamp);
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
    }
  }
}
</script>

<style>

</style>