package com.rzrasel.rzraseltutorial.data.api

import com.rzrasel.rzraseltutorial.data.model.User
import io.reactivex.Single

interface ApiService {

    fun getUsers(): Single<List<User>>

}