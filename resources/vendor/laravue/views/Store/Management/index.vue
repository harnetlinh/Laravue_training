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
          <el-tag :type="scope.row.Status | statusFilter" size="medium">{{ scope.row.Status }}</el-tag>
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
        <template slot-scope="scope">
          <el-button
            size="mini"
            @click="handleEdit(scope.$index, scope.row)">Edit</el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleDelete(scope.$index, scope.row)">Delete</el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
export default {
  filters: {
    statusFilter(Status) {
      const statusMap = {
        Show: 'success',
        Hidden: 'gray',
      };
      return statusMap[Status];
    },
  },
  data() {
    return {
      tableData: [
        {
          StoreName: 'ABC Store',
          TimeCreate: '20/08/2020',
          Owner: 'Tom',
          Status: 'Show',
          Creator: 'Mr.A'
        },
        {
          StoreName: 'ABC Store',
          TimeCreate: '20/08/2020',
          Owner: 'Tom',
          Status: 'Show',
          Creator: 'Mr.A'
        },
        {
          StoreName: 'ABC Store',
          TimeCreate: '20/08/2020',
          Owner: 'Tom',
          Status: 'Hidden',
          Creator: 'Mr.A'
        },
        {
          StoreName: 'ABC Store',
          TimeCreate: '20/08/2020',
          Owner: 'Tom',
          Status: 'Show',
          Creator: 'Mr.A'
        }
      ]
    }
  },
  methods: {
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      console.log(index, row);
    }
  }
}
</script>

<style>

</style>