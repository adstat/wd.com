// pages/Detail/question-detail/question-detail.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    zan: 1,
    shoucan: 1,
    shoucan2: 1,
    actionSheetHidden: true,
    // btnText: "+关注" ,
    btnText: "热度排行",

  },
  btnClick: function () {
    var isShow = this.data.testtrue;
    this.setData({ testtrue: !isShow })
  },
  // btnClick: function () {
  //   this.setData({ btnText: '已关注' })
  // },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  },
  // IMG: function (e) {
  //   wx.showModal({
  //     title: '内容未发布，确认退出吗？',
  //     content: res.msg,
  //     success: function (res) {
  //       if (res.confirm) {
  //         // 点击确定
  //         wx.navigateBack({

  //         })
  //       } else if (res.cancel) {
  //         // 点击取消

  //       }
  //     }
  //   })
  // },
  dianzan: function (e) {
    var that = this;
    var id_zan = e.currentTarget.dataset.id;
    if (id_zan == 1) {
      that.setData({
        zan: 2
      })
    } else if (id_zan == 2) {
      that.setData({
        zan: 1
      })
    }
  },

  shou: function (e) {
    console.log(e)
    var that = this;
    var id_shou = e.currentTarget.dataset.id;
    if (id_shou == 1) {
      that.setData({
        shoucan: 2
      })
    } else if (id_shou == 2) {
      that.setData({
        shoucan: 1
      })
    }
  },
  shou2: function (e) {
    console.log(e)
    var that = this;
    var id_shou = e.currentTarget.dataset.id;
    if (id_shou == 1) {
      that.setData({
        shoucan2: 2
      })
    } else if (id_shou == 2) {
      that.setData({
        shoucan2: 1
      })
    }
  },

  IMG: function () {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden
    })
  },
  actionSheetbindchange: function () {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden
    })
  },
  shoucang: function () {
    // this.setData({
    //   menu: 1,
    //   actionSheetHidden: !this.data.actionSheetHidden
    // })
  },
  jubao: function () {
    // this.setData({
    //   menu: 2,
    //   actionSheetHidden: !this.data.actionSheetHidden
    // })
    wx.navigateTo({
      url: '../report/report',
    })
  },

  // 跳转至添加回答页面
  add_answer:function(e){
    wx.navigateTo({
      url: '../write_answer/write_answer',
    })
  },
  
  //跳转至写回答页面
  write:function(){
    wx.navigateTo({
      url: '../write_answer/write_answer',
    })
  }

})