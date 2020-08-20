<template>
    <div class="app-container">
        <el-table
        :data="tableStore"
        :default-sort = "{prop: 'id storeName'}"
        style="width: 100%">
            <el-table-column
            sortable
            prop="id"
            label="ID">
                <template slot-scope="scope">
                    <span style="margin-left: 10px"> {{scope.row.id}} </span>
                </template>
            </el-table-column>

            <el-table-column
            sortable
            prop="name"
            label="Store Name">
                <template slot-scope="scope">
                    <span style="margin-left: 10px"> {{scope.row.storeName}} </span>
                </template>
            </el-table-column>

            <el-table-column
            sortable
            prop="owner"
            label="Owner">
                <template slot-scope="scope">
                    <span style="margin-left: 10px"> {{scope.row.owner}} </span>
                </template>
            </el-table-column>

            <el-table-column
                label="Operations">
                <template slot-scope="{row}">
                <el-button
                    size="mini"
                    type="warning"
                    @click="handleEdit(row)">Edit</el-button>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tableStore: [
                {
                    id: 1,
                    storeName: 'ABC',
                    owner: 'John'
                },
                {
                    id: 2,
                    storeName: 'XYZ',
                    owner: 'Petter'
                }
            ]
        }
    }
}
</script>

<style>

</style>