// pages/Detail/ask_detail/ask_detail.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    zan: 1,
    shoucan: 1,
    shoucan2: 1,
    actionSheetHidden: true,
    btnText: "热度排行",
    testtrue: true ,
  },

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
  },
  jubao: function () {
    wx.navigateTo({
      url: '../report/report',
    })
  },
  // btnClick: function () {
  //   this.setData({ btnText: '最新发布' })
  // },
  btnClick: function () {
    var isShow = this.data.testtrue;

    this.setData({ testtrue: !isShow })
  },
  add_answer:function(){
    wx.navigateTo({
      url: '../add_ask/add_ask',
    })
  }
})