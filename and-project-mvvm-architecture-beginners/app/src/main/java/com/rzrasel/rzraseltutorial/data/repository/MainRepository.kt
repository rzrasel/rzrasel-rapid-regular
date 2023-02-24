package com.rzrasel.rzraseltutorial.data.repository

import com.rzrasel.rzraseltutorial.data.api.ApiHelper
import com.rzrasel.rzraseltutorial.data.model.User
import io.reactivex.Single

class MainRepository(private val apiHelper: ApiHelper) {

    fun getUsers(): Single<List<User>> {
        return apiHelper.getUsers()
    }

}