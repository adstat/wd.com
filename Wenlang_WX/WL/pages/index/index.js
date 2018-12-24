//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
    id: 0,
    motto: 'Hello World',
    userInfo: {},
    hasUserInfo: false,
    canIUse: wx.canIUse('button.open-type.getUserInfo'),
    nav_active:0,
  },

  //事件处理函数
  bindViewTap: function () {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  onLoad: function () {
    if (app.globalData.userInfo) {
      this.setData({
        userInfo: app.globalData.userInfo,
        hasUserInfo: true
      })
    } else if (this.data.canIUse) {
      // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
      // 所以此处加入 callback 以防止这种情况
      app.userInfoReadyCallback = res => {
        this.setData({
          userInfo: res.userInfo,
          hasUserInfo: true
        })
      }
    } else {
      // 在没有 open-type=getUserInfo 版本的兼容处理
      wx.getUserInfo({
        success: res => {
          app.globalData.userInfo = res.userInfo
          this.setData({
            userInfo: res.userInfo,
            hasUserInfo: true
          })
        }
      })
    }
  },
  getUserInfo: function (e) {
    console.log(e)
    app.globalData.userInfo = e.detail.userInfo
    this.setData({
      userInfo: e.detail.userInfo,
      hasUserInfo: true
    })
  },
  // 圈子问答详情页
  go_next: function (e) {
    wx.navigateTo({
      url: '../Detail/question-detail/question-detail',
    })
    //点击跳转 待返回按钮

    // wx.redirectTo({
    //   url: '../information/information',
    // })
    //点击跳转 适用于底部导航跳转
  },
  
  // 圈子问答中的提问 跳转至提问页面
  lsstitle:function(e){
    wx.navigateTo({
      url: '../Detail/publish/publish',
    })
  },

// 全部问答中的提问 跳转至提问页面
  tiwen: function (e) {
    wx.navigateTo({
      url: '../Detail/ask/ask',
    })
  },

  // 跳转至发布主题页面
  theme:function(e){
    wx.navigateTo({
      url: '../Detail/Issuetheme/Issuetheme',
    })
  },

  // 跳转到打听页面
  pay_m:function(e){
    wx.navigateTo({
      url: '../Detail/Paydetali/Paydetali',
    })
  },

  // 跳转到更多 搜索答主页面
  fbPage:function(e){
    wx.navigateTo({
      url: '../Detail/interlocution/interlocution',
    })
  },
  
  // 跳转至全部回答详情页
  all_go:function(e){
    wx.navigateTo({
      url: '../Detail/ask_detail/ask_detail',
    })
  },
  
 //跳转到主体讨论 详情页
  change: function () {
    wx.navigateTo({
      url: '../Detail/Subdiscussion/Subdiscussion',
    })
  },

// 全部回答中的写回答跳转至写回答页面
huida:function(){
  wx.navigateTo({
    url: '../Detail/add_ask/add_ask',
  })
},
// 跳转至写回答
  write:function(){
    wx.navigateTo({
      url: '../Detail/write_answer/write_answer',
    })
  },
  select: function (e) {
    console.log(e)
    var that = this;
    that.setData({
      id: e.target.dataset.id,
      tit_con: e.target.dataset.tit,
      nav_active:e.target.dataset.id,
    })
  },

})
