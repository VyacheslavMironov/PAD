const axios = require("axios");

test("должен вернуть данные с сервера", async () => {
  const response = await axios.get("http://localhost:8080");

  expect(response.status).toBe(200);
  expect(response.data).toBeDefined();
});
